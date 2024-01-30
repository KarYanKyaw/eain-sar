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

            <h1 class=" text-4xl font-serif font-bold">Currency Exchanger</h1>


        </header>
        <ol class="flex items-center whitespace-nowrap " aria-label="Breadcrumb">
            <li class="inline-flex items-center">
                <a class="flex items-center text-sm text-gray-700 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500" href="#">
                    Home
                </a>
                <svg class="flex-shrink-0 mx-2 overflow-visible h-4 w-4 text-gray-400  " xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6" />
                </svg>
            </li>

            <li class="inline-flex items-center">
                <a class="flex items-center text-sm text-gray-400 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500" href="index.php">
                    Calculate Exchange Rate
                </a>
                <svg class="flex-shrink-0 mx-2 overflow-visible h-4 w-4 text-gray-400  " xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6" />
                </svg>
            </li>

            <li class="inline-flex items-center text-sm  text-gray-400 truncate" aria-current="page">
                Record List
            </li>
        </ol>
        <hr class="  border-gray-300 my-4">

        <section class=" p-5 bg-gray-200 rounded-md">
            <form method="post" action="data.php">



                <div class="mb-4">
                    <label for="fromCurrency" class="block text-sm font-medium text-gray-700">From</label>
                    <select id="fromCurrency" name="fromCurrency" class="mt-1 outline-none border border-gray-800 block w-full p-2 rounded-md">
                        <?php
                        $r = file_get_contents("http://forex.cbm.gov.mm/api/currencies");
                        $data = json_decode($r, true);
                        $rateKeys = $data["currencies"];
                        ?>
                        <?php foreach ($rateKeys as $key => $value) : ?>
                            <option value="<?= $key; ?>"><?= $value; ?></option>
                        <?php endforeach; ?>
                    </select>


                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">To </label>
                    <p class="mt-1 outline-none border border-gray-800 block w-full p-2 rounded-md bg-white">Myanmar</p>
                </div>
                <div class="mb-4">
                    <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
                    <input min="1" type="number" id="amount" name="amount" class="mt-1 outline-none border border-gray-800 block w-full p-2 rounded-md" placeholder="Enter amount" />
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-gray-500 text-white w-full text-center py-2 px-4 rounded hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Exchange</button>
                </div>
        </section>


    </main>

    <script src="./node_modules/preline/dist/preline.js"></script>
</body>

</html>