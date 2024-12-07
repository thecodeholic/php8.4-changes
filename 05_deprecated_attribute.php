<?php
echo PHP_VERSION;
function dump(...$args)
{
    echo '<pre>';
    var_dump(...$args);
    echo '</pre>';
}

class Encoder
{
    #[Deprecated]
    const bool MD5_METHOD = false;

    #[Deprecated("Use bcrypt() instead")]
    public function md5()
    {
    }
}

#[Deprecated("Use bcrypt() instead")]
function my_md5()
{
    return '123...';
}

dump(Encoder::MD5_METHOD);
new Encoder()->md5();
my_md5();