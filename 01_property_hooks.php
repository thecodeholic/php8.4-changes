<?php
echo PHP_VERSION;
function dump(...$args)
{
    echo '<pre>';
    var_dump(...$args);
    echo '</pre>';
}

/*class User
{
    public string $fullName {
        get => $this->firstName . ' ' . $this->lastName;
        set(string $name) {
            $splitName = explode(' ', $name);
            $this->firstName = $splitName[0];
            $this->lastName = $splitName[1];
        }
    }

    public function __construct(
        public string $firstName,
        public string $lastName,
    )
    {
    }
}

$user = new User("Zura", "TheCodeholic");
dump($user->fullName);
$user->fullName = "Zura Sekhniashvili";
dump($user->fullName);*/

class Application
{
    private string $internalApiKey = '123456';

    public string $apiKey {
        get {
            dump("Write log that user accessed API key");
            return $this->internalApiKey;
        }
        set {
            if (/* Can user set API key? */ true) {
                $this->internalApiKey = $value;
            } else {
                throw new \Exception('Invalid api key');
            }
        }
    }
}

$app = new Application();
dump($app->apiKey);
$app->apiKey = '555';
dump($app->apiKey);