<?php

if (empty($_POST["fromCurrency"]) || empty($_POST["amount"])) {

    die("Please Eenter Valid Value");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency App</title>
    <link rel="stylesheet" href="./output.css">
</head>

<body>

    <main class=" max-w-[1000px] mx-auto p-10">

        <header class=" flex gap-5  items-center mb-6">

            <h1 class=" text-3xl font-serif font-bold">Currency Exchanger</h1>


        </header>
        <ol class="flex items-center whitespace-nowrap " aria-label="Breadcrumb">
            <li class="inline-flex items-center">
                <a class="flex items-center text-sm text-gray-400 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500" href="#">
                    Home
                </a>
                <svg class="flex-shrink-0 mx-2 overflow-visible h-4 w-4 text-gray-400  " xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6" />
                </svg>
            </li>

            <li class="inline-flex items-center">
                <a class="flex items-center text-sm text-gray-700 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500" href="index.php">
                    Calculate Exchange Rate
                </a>
                <svg class="flex-shrink-0 mx-2 overflow-visible h-4 w-4 text-gray-400  " xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6" />
                </svg>
            </li>

            <li class="inline-flex items-center text-sm  text-gray-400 truncate " aria-current="page">
                Record List
            </li>
        </ol>

        <hr class="  border-gray-300 my-4">
        <section class=" text-center p-5 bg-gray-200 rounded-md">
            <?php
            $r = file_get_contents("http://forex.cbm.gov.mm/api/latest");
            $data = json_decode($r);
            $amount = $_POST["amount"];
            $fromCurrency = $_POST['fromCurrency'];
            $matchingCurrencies = ($data->rates->$fromCurrency);

            $exchangeRate = str_replace(',', '', $matchingCurrencies);
            $finalResult = number_format($amount * $exchangeRate);
            $fileName = "result.txt";
            if (!file_exists($fileName)) {
                touch($fileName);
            };

            $fileStream = fopen($fileName, "a");
            fwrite($fileStream, "\n$amount $fromCurrency is worth $finalResult in MMK");
            fclose($fileStream);

            ?>


            <p class="text-lg mb-5 text-gray-700">
                <span>
                    <?= number_format($amount) ?> <?= $fromCurrency ?> is worth
                </span>
                <span class=" text-xl text-blue-500 font-mono"> <?= $finalResult ?> </span> <span>in MMK</span>
            </p>
            <a href="./index.php" class=" block mb-3 bg-gray-500 text-white w-full text-center py-2 px-4 rounded hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                Calculate Again
            </a>
            <a href="./result.php" class=" block border  border-gray-600 text-gray-600 hover:text-white duration-150 w-full text-center py-2 px-4 rounded hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                See Reults
            </a>

        </section>


    </main>

    <script src="./node_modules/preline/dist/preline.js"></script>
</body>

</html>