<?php
echo PHP_VERSION;
function dump(...$args)
{
    echo '<pre>';
    var_dump(...$args);
    echo '</pre>';
}

function loadChannelVideos(string $channelName): array
{
    sleep(2);
    $items = [];
    for ($i = 1; $i <= 100000; $i++) {
        $items[] = "Video $i";
    }
    return $items;
}

class Channel
{
    public array $videos = [];
    public function __construct(public string $name)
    {
        dump("Channel::__construct {$this->name}");
        $this->videos = loadChannelVideos($this->name);
    }
}

$reflector = new ReflectionClass(Channel::class);
$lazyObject = $reflector->newLazyGhost(function (Channel $channel) {
    dump("LazyObject object: " . get_class($channel));

    $channel->__construct('TheCodeholic');
});

// $reflector->getProperty('name')->skipLazyInitialization($lazyObject);
// $reflector->getProperty('name')->setValue($lazyObject, 'TheCodeholic');

$reflector->getProperty('name')->setRawValueWithoutLazyInitialization($lazyObject, 'TheCodeholic');

dump($lazyObject);
dump(get_class($lazyObject));
var_dump($lazyObject->name);
var_dump($lazyObject->videos);
dump(memory_get_usage());