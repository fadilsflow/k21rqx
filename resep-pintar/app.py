import os
import re
from flask import Flask, render_template, request
from dotenv import load_dotenv
from google import genai
from google.genai import types

load_dotenv()

app = Flask(__name__)

api_key = os.getenv("GEMINI_API_KEY")
if not api_key:
    raise ValueError("GEMINI_API_KEY tidak ditemukan di .env")

client = genai.Client(api_key=api_key)

def parse_recipes(ai_text):
    recipes = []

    # Coba regex untuk format dengan **Judul**: deskripsi
    for line in ai_text.split("\n"):
        match = re.match(r"^\s*\d+\.\s*\*\*(.+?)\*\*\s*[:：]\s*(.+)", line.strip())
        if match:
            recipes.append({"title": match.group(1).strip(), "desc": match.group(2).strip()})

    # Kalau regex dapat hasil, return
    if recipes:
        return recipes

    # Fallback: cari pola "1. Judul - deskripsi"
    for line in ai_text.split("\n"):
        match = re.match(r"^\s*\d+\.\s*(.+?)[\-–:]\s*(.+)", line.strip())
        if match:
            recipes.append({"title": match.group(1).strip(), "desc": match.group(2).strip()})

    if recipes:
        return recipes

    # Fallback terakhir: kembalikan teks mentah jadi satu card
    return [{"title": "Hasil AI", "desc": ai_text.strip()}]

@app.route("/", methods=["GET", "POST"])
def index():
    recipes = None
    if request.method == "POST":
        ingredients = request.form.get("ingredients", "").strip()
        if ingredients:
            prompt = (
                f"Buatkan 3 ide resep masakan kreatif menggunakan bahan berikut: {ingredients}. "
                f"Gunakan format:\n"
                f"1. **Nama Resep**: deskripsi singkat\n"
                f"2. **Nama Resep**: deskripsi singkat\n"
                f"3. **Nama Resep**: deskripsi singkat"
            )
            try:
                response = client.models.generate_content(
                    model="gemini-2.5-flash",
                    contents=prompt,
                    config=types.GenerateContentConfig(
                        temperature=0.7,
                        max_output_tokens=512,
                        thinking_config=types.ThinkingConfig(thinking_budget=0)
                    ),
                )
                recipes = parse_recipes(response.text)
            except Exception as e:
                recipes = [{"title": "Error", "desc": str(e)}]
    return render_template("index.html", recipes=recipes)

if __name__ == "__main__":
    app.run(debug=True)
