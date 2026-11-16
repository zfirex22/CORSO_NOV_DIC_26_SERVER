<?php
// Funzioni usate da tutte le pagine del catalogo.

// e(): stampa il testo in modo sicuro dentro l'HTML.
// htmlspecialchars trasforma < > & " in entità: se un titolo contenesse <script>,
// il browser lo mostrerebbe come testo invece di eseguirlo (attacco XSS, giorno 7).
function e(string $testo): string
{
    return htmlspecialchars($testo, ENT_QUOTES, 'UTF-8');
}

function trovaLibro(array $libri, int $id): ?array   // ?array = un array oppure null
{
    foreach ($libri as $libro) {
        if ($libro['id'] === $id) {
            return $libro;
        }
    }
    return null;
}
