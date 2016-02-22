<?php
$cats = $db->rows("SELECT c.id,c.name,c.url, COUNT(p.id) AS count FROM categories AS c LEFT JOIN programs AS p ON c.id = p.category GROUP BY c.id");