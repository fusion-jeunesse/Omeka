<?php
/**
 * @version $Id$
 * @copyright Center for History and New Media, 2007-2010
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 * @package Omeka
 **/

/**
 * 
 *
 * @package Omeka
 * @copyright Center for History and New Media, 2007-2010
 **/
class Omeka_Controllers_ChangePasswordTest extends Omeka_Test_AppTestCase
{    
    public function setUp()
    {
        parent::setUp();
                
        // Set the ACL to allow access to users.
        $this->acl->allow(null, 'Users');                
        $this->user = $this->db->getTable('User')->find(1);
        $this->salt = $this->user->salt;
        
        // The user is attempting to change their own password.
        // Pretend that this user is not a super user.
        $this->_authenticateUser($this->user);
        $this->user->role = 'admin';
    }

    public function assertPreConditions()
    {
        $this->assertTrue($this->user instanceof User);
        $this->assertTrue($this->user->exists());
        $this->assertNotNull($this->salt, "Salt not being set properly by installer.");
        $this->_assertPasswordNotChanged();
    }
    
    public function assertPostConditions()
    {
        $this->_assertSaltNotChanged();
    }
    
    public function testChangingPassword()
    {
        $this->_dispatchChangePassword(array(
            'current_password'  => Omeka_Test_Resource_Db::SUPER_PASSWORD,
            'new_password' => 'foobar6789',
            'new_password_confirm' => 'foobar6789'
        ));
        $this->_assertPasswordIs('foobar6789');
    }
    
    public function testSuperUserCanChangePasswordWithoutKnowingOriginal()
    {
        $this->user->role = 'super';
        $this->_dispatchChangePassword(array(
            'new_password' => 'foobar6789',
            'new_password_confirm' => 'foobar6789'
        ));
        $this->_assertPasswordIs('foobar6789');
    }
    
    public function testChangingPasswordFailsWithInvalidPassword()
    {
        $this->_dispatchChangePassword(array(
            'current_password'  => 'wrongpassword',
            'new_password' => 'foo',
            'new_password_confirm' => 'foo'
        ));
        $this->_assertPasswordNotChanged();
    }
    
    public function testChangePasswordFailsIfPasswordNotConfirmed()
    {
        $this->_dispatchChangePassword(array(
            'current_password'  => 'foobar123',
            'new_password' => 'foo'
        ));
        $this->_assertPasswordNotChanged();
    }
    
    private function _assertPasswordNotChanged()
    {
        $this->_assertPasswordIs(Omeka_Test_Resource_Db::SUPER_PASSWORD,
                                 "Hashed password should not have changed.");
    }
    
    private function _assertPasswordIs($pass, $msg = null)
    {
        $this->assertEquals($this->db->fetchOne("SELECT password FROM omeka_users WHERE id = 1"),
                            $this->user->hashPassword($pass),
                            $msg);
    }
    
    private function _assertSaltNotChanged()
    {
        $this->assertEquals($this->db->fetchOne("SELECT salt FROM omeka_users WHERE id = 1"),
                                                $this->salt,
                                                "Salt should not have changed.");
    }    
    
    private function _dispatchChangePassword(array $form)
    {
        $this->getRequest()->setPost($form);
        $this->getRequest()->setMethod('post');
        $this->dispatch('/users/edit/1', true);
    }
}