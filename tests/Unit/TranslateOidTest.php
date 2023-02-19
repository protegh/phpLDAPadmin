<?php

namespace Tests\Unit;

use LdapRecord\Query\ObjectNotFoundException;
use Tests\TestCase;

use App\Classes\LDAP\Server;

class TranslateOidTest extends TestCase
{
	/**
	 * A basic feature test example.
	 *
	 * @return void
	 * @covers \App\Classes\LDAP\Server::getOID()
	 * @throws ObjectNotFoundException
	 */
	public function testRootDse()
	{
		$dse = Server::rootDSE();

		// Test our rootDSE returns an objectclass attribute
		$this->assertIsArray($dse->objectclass);
		// Test OID that exists
		$this->assertStringContainsString('Subentries',Server::getOID('1.3.6.1.4.1.4203.1.10.1','title'));
		// Test OID doesnt exist
		$this->assertStringContainsString('9.9.9.9',Server::getOID('9.9.9.9','title'));
		$this->assertNull(Server::getOID('9.9.9.9','ref'));
	}
}
