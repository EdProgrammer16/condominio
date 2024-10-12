<?php

namespace Core;

use League\OAuth2\Client\Provider\GenericProvider;

class OAuth2Provider {
    private $provider;

    public function __construct() {
        $this->provider = new GenericProvider([
            'clientId' => 'your_client_id',
            'clientSecret' => 'your_client_secret',
            'redirectUri' => 'http://your-redirect-uri',
            'urlAuthorize' => 'https://provider.com/oauth2/authorize',
            'urlAccessToken' => 'https://provider.com/oauth2/token',
            'urlResourceOwnerDetails' => 'https://provider.com/oauth2/resource'
        ]);
    }

    /**
     * Obtém a URL de autorização.
     *
     * @return string URL de autorização
     */
    public function getAuthorizationUrl() {
        return $this->provider->getAuthorizationUrl();
    }

    /**
     * Obtém o token de acesso.
     *
     * @param string $code Código de autorização
     * @return array Dados do token
     */
    public function getAccessToken($code) {
        return $this->provider->getAccessToken('authorization_code', [
            'code' => $code
        ]);
    }

    /**
     * Obtém os dados do usuário usando o token.
     *
     * @param string $token Token de acesso
     * @return array Dados do usuário
     */
    public function getUserDetails($token) {
        $resourceOwner = $this->provider->getResourceOwner($token);
        return $resourceOwner->toArray();
    }
}
