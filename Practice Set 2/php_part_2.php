<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Word Frequency Counter</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <h1>Word Frequency Counter</h1>

    <form id="wordFrequencyForm" method="post" action="">
        <label for="text">Paste your text here:</label><br>
        <textarea id="text" name="text" rows="10" cols="50" required><?php if (isset($_POST['text']))
            echo htmlspecialchars($_POST['text']); ?></textarea><br><br>

        <label for="sort">Sort by frequency:</label>
        <select id="sort" name="sort">
            <option value="asc" <?php if (isset($_POST['sort']) && $_POST['sort'] == 'asc')
                echo 'selected'; ?>>Ascending
            </option>
            <option value="desc" <?php if (isset($_POST['sort']) && $_POST['sort'] == 'desc')
                echo 'selected'; ?>>
                Descending</option>
        </select><br><br>

        <label for="limit">Number of words to display:</label>
        <input type="number" id="limit" name="limit" value="<?php if (isset($_POST['limit']))
            echo htmlspecialchars($_POST['limit']); ?>" min="1"><br><br>

        <input type="submit" name="submit" value="Calculate Word Frequency">
    </form>

    <div id="wordFrequencyResult">

        <?php
        if (isset($_POST['submit'])) {

            function calculateWordFrequency($text)
            {
                $stopwords = array('a', 'an', 'and', 'are', 'as', 'at', 'be', 'by', 'for', 'from', 'has', 'he', 'in', 'is', 'it', 'its', 'of', 'on', 'that', 'the', 'to', 'was', 'were', 'will', 'with');
                $words = str_word_count($text, 1);
                $words = array_map(function ($word) {
                    return strtolower($word);
                }, $words);
                $words = array_diff($words, $stopwords);
                $wordFreq = array_count_values($words);
                return $wordFreq;
            }

            $text = $_POST['text'];
            $wordFreq = calculateWordFrequency($text);

            if (isset($_POST['sort']) && $_POST['sort'] == 'desc') {
                arsort($wordFreq);
            } else {
                asort($wordFreq);
            }

            if (isset($_POST['limit'])) {
                $limit = $_POST['limit'];
                $wordFreq = array_slice($wordFreq, 0, $limit, true);
            }

            foreach ($wordFreq as $word => $freq) {
                echo htmlspecialchars("$word: $freq");
                echo "<br>";
            }
        }
        ?>
    </div>
</body>

</html>