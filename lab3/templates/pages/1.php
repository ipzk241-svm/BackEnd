
<form action="" method="post">
    <div class="<?= $fontSize ?>">
        <a href="?<?= http_build_query(array_merge($_GET, ['fs' => 'big'])) ?>">Великий шрифт</a>
        <a href="?<?= http_build_query(array_merge($_GET, ['fs' => 'middle'])) ?>">Середній шрифт</a>
        <a href="?<?= http_build_query(array_merge($_GET, ['fs' => 'small'])) ?>">Малий шрифт</a>
    </div>
</form>