<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Translator</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Translator Web</h2>
        <form id="translatorForm" action="<?= base_url('/translate') ?>" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="textToTranslate" class="form-label">Text to Translate</label>
                <textarea class="form-control" id="textToTranslate" name="textToTranslate" rows="4" placeholder="Enter text here..."></textarea>
            </div>
            <div class="mb-3">
                <label for="sourceLanguage" class="form-label">Source Language</label>
                <select class="form-select" id="sourceLanguage" name="sourceLanguage">
                    <?php foreach ($languages as $language): ?>
                        <option value="<?= $language['name'] ?>">
                            <?= is_array($language) && isset($language['name']) ? $language['name'] : strtoupper($language['language'] ?? '')?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="targetLanguage" class="form-label">Target Language</label>
                <select class="form-select" id="targetLanguage" name="targetLanguage">
                    <?php foreach ($languages as $language): ?>
                        <option value="<?= $language['name'] ?>">
                            <?= is_array($language) && isset($language['name']) ? $language['name'] : strtoupper($language['language'] ?? '') ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Translate</button>
            </div>
        </form>
        <hr>
        <div id="translatedText" class="mt-4">
            <h4>Translation Result:</h4>
            <p class="border p-3" id="translationResult">
                <?= isset($translationResult) ? esc($translationResult) : 'Your translated text will appear here...' ?>
            </p>
        </div>
    </div>
</body>
</html>
