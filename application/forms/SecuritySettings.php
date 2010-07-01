<?php
/**
 * @version $Id$
 * @copyright Center for History and New Media, 2007-2010
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 * @package Omeka
 **/

/**
 * Security settings form.
 *
 * @package Omeka
 * @copyright Center for History and New Media, 2007-2010
 **/
class Omeka_Form_SecuritySettings extends Omeka_Form
{
    
    public function init()
    {
        parent::init();
        
        $this->addElement('checkbox', File::DISABLE_DEFAULT_VALIDATION_OPTION,
            array(
                'label' => 'Disable File Upload Validation',
                'checked' => get_option(File::DISABLE_DEFAULT_VALIDATION_OPTION),
                'description' => 'Check this field if you would like to allow any file to be uploaded to Omeka.'
            )
        );
        
        $this->addElement('textarea', Omeka_Validate_File_Extension::WHITELIST_OPTION,
            array(
                'label' => 'Allowed File Extensions',
                'description' => 'List of allowed extensions for file uploads.',
                'value' => get_option(Omeka_Validate_File_Extension::WHITELIST_OPTION),
                'cols'=>50, 
                'rows'=>5
            )
        );
        
        $this->addElement('textarea', Omeka_Validate_File_MimeType::WHITELIST_OPTION,
            array(
                'label' => 'Allowed File Types',
                'description' => 'List of allowed MIME types for file uploads',
                'value' => get_option(Omeka_Validate_File_MimeType::WHITELIST_OPTION),
                'cols' => 50, 
                'rows' => 5
            )
        );
        
        $this->addElement('checkbox', Omeka_Validate_File_MimeType::HEADER_CHECK_OPTION,
            array(
                'label' => 'Enable Header Check For File Types',
                'description' => 'Check this field if you would like to allow file types to be inferred from a file header check.',
                'checked' => (boolean)get_option(Omeka_Validate_File_MimeType::HEADER_CHECK_OPTION),
                
            )
        );
        
        $this->addElement('submit', 'security_submit', array(
            'class' => 'submit-medium',
            'label' => 'Save Changes'
        ));
    }
}