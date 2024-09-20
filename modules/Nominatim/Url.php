<?php

namespace Modules\Nominatim;

class Url
{
    protected string $url;
    protected array $params;

    public function __construct(string $path, array $params)
    {
        $this->url = rtrim(config('services.nominatim.url'), '/') . '/' . rtrim($path, '/');
        $this->params = $params;
    }

    public function toString()
    {
        $url = $this->url;

        if ($this->params) {
            $url .= '?'.$this->prepareParams();
        }

        return $url;
    }

    private function prepareParams(): string
    {
        $preparedParams = [];

        foreach ($this->params as $param => $value) {
            $preparedParams[] = $param.'='.$value;
        }

        return implode('&', $preparedParams);
    }
}
