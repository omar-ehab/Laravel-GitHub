<?php

/*
 * This file is part of Laravel GitHub.
 *
 * (c) Graham Campbell <graham@cachethq.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GrahamCampbell\Tests\GitHub\Authenticators;

use GrahamCampbell\GitHub\Authenticators\AuthenticatorFactory;
use GrahamCampbell\Tests\GitHub\AbstractTestCase;

/**
 * This is the authenticator factory test class.
 *
 * @author Graham Campbell <graham@cachethq.io>
 */
class AuthenticatorFactoryTest extends AbstractTestCase
{
    public function testMakeApplicationAuthenticator()
    {
        $factory = $this->getFactory();

        $return = $factory->make('application');

        $this->assertInstanceOf('GrahamCampbell\GitHub\Authenticators\ApplicationAuthenticator', $return);
    }

    public function testMakePasswordAuthenticator()
    {
        $factory = $this->getFactory();

        $return = $factory->make('password');

        $this->assertInstanceOf('GrahamCampbell\GitHub\Authenticators\PasswordAuthenticator', $return);
    }

    public function testMakeTokenAuthenticator()
    {
        $factory = $this->getFactory();

        $return = $factory->make('token');

        $this->assertInstanceOf('GrahamCampbell\GitHub\Authenticators\TokenAuthenticator', $return);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Unsupported authentication method [foo].
     */
    public function testMakeInvalidAuthenticator()
    {
        $factory = $this->getFactory();

        $return = $factory->make('foo');
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Unsupported authentication method [].
     */
    public function testMakeNoAuthenticator()
    {
        $factory = $this->getFactory();

        $return = $factory->make(null);
    }

    protected function getFactory()
    {
        return new AuthenticatorFactory();
    }
}
