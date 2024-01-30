     <?php


                $fileName = "result.txt";

                if (!file_exists($fileName)) {
                    touch($fileName);
                };

                $fileStream = fopen($fileName, "r");

          while (!feof($fileStream)) :
                    $content = fgets($fileStream);
                    print_r($content);
                endwhile;
                ?>