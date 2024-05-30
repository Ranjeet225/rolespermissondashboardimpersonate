<?php
/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Oauth
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Twilio\Rest\Oauth\V1;

use Twilio\Options;
use Twilio\Values;

abstract class AuthorizeOptions
{
    /**
     * @param string $responseType Response Type
     * @param string $clientId The Client Identifier
     * @param string $redirectUri The url to which response will be redirected to
     * @param string $scope The scope of the access request
     * @param string $state An opaque value which can be used to maintain state between the request and callback
     * @return FetchAuthorizeOptions Options builder
     */
    public static function fetch(
        
        string $responseType = Values::NONE,
        string $clientId = Values::NONE,
        string $redirectUri = Values::NONE,
        string $scope = Values::NONE,
        string $state = Values::NONE

    ): FetchAuthorizeOptions
    {
        return new FetchAuthorizeOptions(
            $responseType,
            $clientId,
            $redirectUri,
            $scope,
            $state
        );
    }

}

class FetchAuthorizeOptions extends Options
    {
    /**
     * @param string $responseType Response Type
     * @param string $clientId The Client Identifier
     * @param string $redirectUri The url to which response will be redirected to
     * @param string $scope The scope of the access request
     * @param string $state An opaque value which can be used to maintain state between the request and callback
     */
    public function __construct(
        
        string $responseType = Values::NONE,
        string $clientId = Values::NONE,
        string $redirectUri = Values::NONE,
        string $scope = Values::NONE,
        string $state = Values::NONE

    ) {
        $this->options['responseType'] = $responseType;
        $this->options['clientId'] = $clientId;
        $this->options['redirectUri'] = $redirectUri;
        $this->options['scope'] = $scope;
        $this->options['state'] = $state;
    }

    /**
     * Response Type
     *
     * @param string $responseType Response Type
     * @return $this Fluent Builder
     */
    public function setResponseType(string $responseType): self
    {
        $this->options['responseType'] = $responseType;
        return $this;
    }

    /**
     * The Client Identifier
     *
     * @param string $clientId The Client Identifier
     * @return $this Fluent Builder
     */
    public function setClientId(string $clientId): self
    {
        $this->options['clientId'] = $clientId;
        return $this;
    }

    /**
     * The url to which response will be redirected to
     *
     * @param string $redirectUri The url to which response will be redirected to
     * @return $this Fluent Builder
     */
    public function setRedirectUri(string $redirectUri): self
    {
        $this->options['redirectUri'] = $redirectUri;
        return $this;
    }

    /**
     * The scope of the access request
     *
     * @param string $scope The scope of the access request
     * @return $this Fluent Builder
     */
    public function setScope(string $scope): self
    {
        $this->options['scope'] = $scope;
        return $this;
    }

    /**
     * An opaque value which can be used to maintain state between the request and callback
     *
     * @param string $state An opaque value which can be used to maintain state between the request and callback
     * @return $this Fluent Builder
     */
    public function setState(string $state): self
    {
        $this->options['state'] = $state;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Oauth.V1.FetchAuthorizeOptions ' . $options . ']';
    }
}
