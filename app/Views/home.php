<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Translator</title>
    <link rel="stylesheet" href="assets/style.css">

</head>

<body>
    <div class="title">
        <h2 class="text-center">WEB TRANSLATOR</h2>
    </div>

    <div class="container mt-5">
        <form id="translatorForm" action="<?= base_url('/translate') ?>" method="POST" class="mt-4">
            <div class="language">
                <div class="mb-6">
                    <div class="source">
                        <label for="sourceLanguage" class="form-label">Source Language</label>
                        <select class="form-select" id="sourceLanguage" name="sourceLanguage">
                            <?php foreach ($languages as $language): ?>
                                <option value="<?= $language['code'] ?>">
                                    <?= $language['name'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="sourceText">
                        <div class="mb-3">
                            <label for="textToTranslate" class="form-label">Text to Translate</label>
                            <textarea class="form-control" id="textToTranslate" name="textToTranslate" rows="4" placeholder="Enter text here..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="mb-6">
                    <div class="terget">
                        <label for="targetLanguage" class="form-label">Target Language</label>
                        <select class="form-select" id="targetLanguage" name="targetLanguage">
                            <?php foreach ($languages as $language): ?>
                                <option value="<?= $language['code'] ?>">
                                    <?= $language['name'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="result">
                        <div id="translatedText" class="mt-4">
                            <h4>Translation Result:</h4>
                            <p class="border p-3" id="translationResult">
                                <?= isset($translationResult) ? esc($translationResult) : 'Your translated text will appear here...' ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Translate</button>
            </div>
        </form>
    </div>
</body>

</html>
<script>
    // untuk update language secara dynamic pas teks ditulis pada textarea
    function updateLang() {
        fetch('<? base_url('getLanguages') ?>')
            .then(response => response.json())
            .then(data => {

                let sourceLang = document.querySelector('#sourceLanguage');
                sourceLang.innerHTML = '';
                data.languages.forEach(language => {
                    const dropdownListElem = document.createElement('option');
                    dropdownListElem.value = language.name;
                    dropdownListElem.textContent = language.name;

                    sourceLang.appendChild(dropdownListElem)
                })
            }).catch(error => console.log(error)); // catch handler kalo gagal isi datanya
    }

    setInterval(updateLanguages, 300);
    updateLanguages(); // ini call pertama saat initialize
</script>