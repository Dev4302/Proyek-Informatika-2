<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Translator</title>
    <link rel="stylesheet" href="assets/css/style">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Translator Web</h2>
        <form id="translatorForm" action="translate.php" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="textToTranslate" class="form-label">Text to Translate</label>
                <textarea class="form-control" id="textToTranslate" name="textToTranslate" rows="4" placeholder="Enter text here..."></textarea>
            </div>
            <div class="mb-3">
                <label for="sourceLanguage" class="form-label">Source Language</label>
                <select class="form-select" id="sourceLanguage" name="sourceLanguage">
                    <option value="en">English</option>
                    <option value="id">Indonesian</option>
                    <option value="fr">French</option>
                    <option value="es">Spanish</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="targetLanguage" class="form-label">Target Language</label>
                <select class="form-select" id="targetLanguage" name="targetLanguage">
                    <option value="id">Indonesian</option>
                    <option value="en">English</option>
                    <option value="fr">French</option>
                    <option value="es">Spanish</option>
                </select>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Translate</button>
            </div>
        </form>
        <hr>
        <div id="translatedText" class="mt-4">
            <h4>Translation Result:</h4>
            <p class="border p-3" id="translationResult">Your translated text will appear here...</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
