<?php
echo PHP_VERSION . '<br>';

function dump(...$args)
{
    echo '<pre>';
    var_dump(...$args);
    echo '</pre>';
}

class Channel
{
    public function __construct(
        public private(set) string $name,
        public protected(set) string $country,
        protected private(set) int $income,
    )
    {
    }
}

class VerifiedChannel extends Channel
{
    public function update(string $country, int $income): void
    {
        $this->country = $country; // OK
        $this->income = $income;
    }
}

$c = new VerifiedChannel('TheCodeholic', 'Georgia', 100);

dump($c->name); // Works
dump($c->country); // Works
//dump($c->income);

//$c->update('USA', 200);

$c->name = 'TheCodeholic Zura';
$c->country = 'Georgia';
$c->income = 200;