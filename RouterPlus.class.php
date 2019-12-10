<?php
class RouterPlus extends AltoRouter
{
    private $oldRoutes = [];
    private $requestUri;
    private $retocompatible;

    public function __construct(bool $retocompatible = false, array $routes = [], $basePath = '', array $matchTypes = [], ?array $oldRoutes = null)
    {
        Parent::__construct($routes, $basePath, $matchTypes);
        if (is_array($oldRoutes)) {
            $this->oldRoutes = $oldRoutes;
        }
        $this->requestUri = $_SERVER["REQUEST_URI"];
        $this->retocompatible = $retocompatible;
    }

    public function addOldRoute(string $oldroute, string $newRoute): self
    {
        $this->oldRoutes["/" . $oldroute] = $newRoute;
        return $this;
    }

    public function redirect(): void
    {
        foreach ($this->oldRoutes as $oldRoute => $newRoute) {
            $this->verify($oldRoute, $newRoute);
        }
    }

    private function verify(string $oldRoute, string $newRoute): void
    {
        if ($this->requestUri == $oldRoute) {
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $newRoute);
            exit();
        }
    }

    /**
     * Match a given Request Url against stored routes
     * @param string $requestUrl
     * @param string $requestMethod
     * @return array|boolean Array with route information on success, false on failure (no match).
     */
    public function match($requestUrl = null, $requestMethod = null)
    {
        $match = parent::match($requestUrl, $requestMethod);
        if ($this->retocompatible) {
            if (empty($_GET)) {
                $_GET = $match['params'];
            }
        }
        return $match;
    }

    /**
     * Map a route to a target
     *
     * @param string $method One of 5 HTTP Methods, or a pipe-separated list of multiple HTTP Methods (GET|POST|PATCH|PUT|DELETE)
     * @param string $route The route regex, custom regex must start with an @. You can use multiple pre-set regex filters, like [i:id]
     * @param mixed $target The target where this route should point to. Can be anything.
     * @param string $name Optional name of this route. Supply if you want to reverse route this url in your application.
     * @throws Exception
     */
    public function map($method, $route, $target, $name = null): self
    {
        parent::map($method, $route, $target, $name);
        return $this;
    }
}
