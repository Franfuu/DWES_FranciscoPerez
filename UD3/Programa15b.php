<?php
// Crear una nueva cola
$queue = new SplQueue();

// Añadir elementos a la cola
$queue->enqueue("Primero");
$queue->enqueue("Segundo");
$queue->enqueue("Tercero");

// Sacar elementos de la cola (FIFO: First In, First Out)
echo $queue->dequeue(); // Output: Primero
echo "\n";
echo $queue->dequeue(); // Output: Segundo
echo "\n";
echo $queue->dequeue(); // Output: Tercero
?>
<?php
$file = new SplFileObject('Entrega3.md', 'r');

// iterate over its contents
while (!$file->eof()) {
    // get the current line
    $line = $file->fgets();
    echo $line;
    // trim it, and then check if its empty
    if (empty(trim($line))) {
        // skips the current iteration
        continue;
    }
}
?>