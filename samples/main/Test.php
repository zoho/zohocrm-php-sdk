<?php 
namespace samples\main;

use samples\src\com\zoho\crm\api\initializer\Initialize;

use samples\src\com\zoho\crm\api\attachments\Attachment;

use samples\src\com\zoho\crm\api\blueprint\BluePrint;

use samples\src\com\zoho\crm\api\bulkread\BulkRead;

use samples\src\com\zoho\crm\api\bulkwrite\BulkWrite;

use samples\src\com\zoho\crm\api\contactroles\ContactRoles;

use samples\src\com\zoho\crm\api\currencies\Currency;

use samples\src\com\zoho\crm\api\customview\CustomView;

use samples\src\com\zoho\crm\api\fields\Fields;

use samples\src\com\zoho\crm\api\file\File;

use samples\src\com\zoho\crm\api\layouts\Layout;

use samples\src\com\zoho\crm\api\modules\Modules;

use samples\src\com\zoho\crm\api\notes\Note;

use samples\src\com\zoho\crm\api\organization\Organization;

use samples\src\com\zoho\crm\api\profile\Profile;

use samples\src\com\zoho\crm\api\record\Record;

use samples\src\com\zoho\crm\api\relatedlist\RelatedList;

use samples\src\com\zoho\crm\api\relatedrecords\RelatedRecords;

use samples\src\com\zoho\crm\api\role\Role;

use samples\src\com\zoho\crm\api\sharerecords\ShareRecords;

use samples\src\com\zoho\crm\api\tags\Tag;

use samples\src\com\zoho\crm\api\taxes\Tax;

use samples\src\com\zoho\crm\api\territories\Territory;

use samples\src\com\zoho\crm\api\users\User;

use samples\src\com\zoho\crm\api\variablegroups\VariableGroup;

use samples\src\com\zoho\crm\api\variables\Variable;

use samples\src\com\zoho\crm\api\notification\Notification;

use samples\src\com\zoho\crm\api\query\Query;

use com\zoho\crm\api\util\ModuleFieldsHandler;

class Test
{
    public static function main()
    {
		Initialize::initialize();

		self::moduleFieldsHandler();

        self::Attachment();

        self::BluePrint();

        self::BulkRead();

        self::BulkWrite();

        self::ContactRoles();

		self::Currency();
		
		self::CustomView();

		self::Field();

		self::File();

		self::Layout();

		self::Module();

		self::Note();

		self::Notification();

		self::Organization();

		self::Profile();

		self::Query();

		self::Record();

		self::RelatedList();

		self::RelatedRecords();

		self::Role();

		self::ShareRecords();

		self::Tags();

		self::Tax();

		self::Territory();

		self::User();

		self::VariableGroup();

		self::Variable();
	}
	
	public static function moduleFieldsHandler()
	{
		// Refresh Fields of a single module
		ModuleFieldsHandler::refreshFields("Leads");

		// Refresh Fields of all the modules
		ModuleFieldsHandler::refreshAllModules();

		// Delete the fields JSON file of the current user
		ModuleFieldsHandler::deleteFieldsFile();

		// Delete the fields JSON file of the all the users
		ModuleFieldsHandler::deleteAllFieldFiles();
	}

    public static function Attachment()
    {
        $moduleAPIName = "Leads";
		
        $recordId = "3477xxxx";

        $absoluteFilePath = "/Users/abc-XXX/Desktop/py.html";

        $attachmentIds = array("3477xxx", "3477xxx");

        $destinationFolder = "/Users/abc-XXX/Desktop";

        $attachmentId = "3477xxx";

        $attachmentURL = "https://5.imimg.com/data5/KJ/UP/MY-8655440/zoho-crm-500x500.png";

        Attachment::uploadAttachments($moduleAPIName, $recordId, $absoluteFilePath);
        
        Attachment::getAttachments($moduleAPIName, $recordId);
        
        Attachment::deleteAttachments($moduleAPIName, $recordId, $attachmentIds);
        
        Attachment::downloadAttachment($moduleAPIName, $recordId, $attachmentId, $destinationFolder);
        
        Attachment::deleteAttachment($moduleAPIName, $recordId, $attachmentId);
        
        Attachment::uploadLinkAttachments($moduleAPIName, $recordId, $attachmentURL);
    }

    public static function BluePrint()
	{
		$moduleAPIName = "Leads";

		$recordId = "3477xxx";
		
		$transitionId = "3477xxx";
		
        BluePrint::getBlueprint($moduleAPIName, $recordId);
		
		BluePrint::updateBlueprint($moduleAPIName, $recordId, $transitionId);
    }

    public static function BulkRead()
    {
        $moduleAPIName = "Leads";
		
		$jobId = "3477xxx";
		
		$destinationFolder = "/Users/abc-XXX/Desktop";
		
		BulkRead::createBulkReadJob($moduleAPIName);
		
		BulkRead::getBulkReadJobDetails($jobId);
		
		BulkRead::downloadResult($jobId, $destinationFolder);
    }

    public static function BulkWrite()
	{
		$absoluteFilePath = "/Users/abc-XXX/Desktop/Leads.zip";
		
		$orgID = "673xxx";
		
		$moduleAPIName = "Leads";
		
		$fileId  = "3477xxx";
		
		$jobID = "3477xxx";
		
		$downloadUrl = "https://download-accl.zoho.com/v2/crm/673xxx/bulk-write/3477xxx/3477xxx.zip";
		
		$destinationFolder = "/Users/abc-XXX/Desktop";
		
		BulkWrite::uploadFile($orgID, $absoluteFilePath);
		
		BulkWrite::createBulkWriteJob($moduleAPIName, $fileId);
		
		BulkWrite::getBulkWriteJobDetails($jobID);
		
		BulkWrite::downloadBulkWriteResult($downloadUrl, $destinationFolder);
    }

    public static function ContactRoles()
	{
		$contactRoleId = "3477xxx";
		
		$contactRoleIds = array("3477xxx","3477xxx","3477xxx","3477xxx","3477xxx");
		
		ContactRoles::getContactRoles();
		
		ContactRoles::createContactRoles();
		
		ContactRoles::updateContactRoles();
		
		ContactRoles::deleteContactRoles($contactRoleIds);
		
		ContactRoles::getContactRole($contactRoleId);
		
		ContactRoles::updateContactRole($contactRoleId);
		
		ContactRoles::deleteContactRole($contactRoleId);
    }

    public static function Currency()
	{	
		$currencyId = "3477xxx";
		
		Currency::getCurrencies();
		
		Currency::addCurrencies();
		
		Currency::updateCurrencies();
		
		Currency::enableMultipleCurrencies();
		
		Currency::updateBaseCurrency();
		
		Currency::getCurrency($currencyId);
		
		Currency::updateCurrency($currencyId);
    }
    
    public static function CustomView()
	{
		$moduleAPIName = "Leads";
		
		$customID = "3477xxx";
		
		CustomView::getCustomViews($moduleAPIName);
		
		CustomView::getCustomView($moduleAPIName, $customID);
    }
    
    public static function Field()
	{
		$moduleAPIName = "Leads";
		
		$fieldId = "3477xxx";
		
		Fields::getFields($moduleAPIName);
		
		Fields::getField($moduleAPIName, $fieldId);
    }
    
    public static function File()
	{
		$destinationFolder = "/Users/abc-XXX/Desktop";
		
		$id = "ae9c7cefa418aec1d6a5cc2d9ab35c32f749e88f5daa9052d08e374843488ce3";
		
		File::uploadFiles();
		
		File::getFile($id, $destinationFolder);
    }
    
    public static function Layout()
	{
		$moduleAPIName = "Leads";
		
		$layoutId = "3477xxx";
		
		Layout::getLayouts($moduleAPIName);
		
		Layout::getLayout($moduleAPIName, $layoutId);
	}

	public static function Module()
	{
		$moduleAPIName = "apiName1";
		
		$moduleId = "3477xxx";
		
		Modules::getModules();
		
		Modules::getModule($moduleAPIName);
		
		Modules::updateModuleByAPIName($moduleAPIName);
		
		Modules::updateModuleById($moduleId);
    }
    
    public static function Note()
	{
		$notesId = array("3477xxx","3477xxx","3477xxx");
		
		$noteId = "3477xxx";
		
		Note::getNotes();
		
		Note::createNotes();
		
		Note::updateNotes();
		
		Note::deleteNotes($notesId); 
		
		Note::getNote($noteId);
		
		Note::updateNote($noteId);
		
		Note::deleteNote($noteId);
    }
    
    public static function Notification() 
	{
		$channelIds = array("100000006800212");
			
		Notification::enableNotifications();
		
		Notification::getNotificationDetails();
		
		Notification::updateNotifications();
		
		Notification::updateNotification();
		
		Notification::disableNotifications($channelIds);
		
		Notification::disableNotification();
    }
    
    public static function Organization()
	{
		$absoluteFilePath = "/Users/abc-XXX/Desktop/image.png";
		
		Organization::getOrganization();
		
		Organization::uploadOrganizationPhoto($absoluteFilePath);
    }
    
    public static function Profile()
	{
		$profileId = "3477xxx";
		
		Profile::getProfiles();
		
		Profile::getProfile($profileId);
	}

	public static function Query()
	{
		Query::getRecords();
    }
    
    public static function Record()
	{
		$moduleAPIName = "Leads";
		
		$recordId = "3477xxx";
		
		$destinationFolder =  "/Users/abc-XXX/Desktop";
		
		$absoluteFilePath = "/Users/abc-XXX/Desktop/record_image.png";
		
		$recordIds = array("3477xxx","3477xxx","3477xxx");
		
		$jobId = "3477xxx";
		
		Record::getRecord($moduleAPIName, $recordId, $destinationFolder);
		
		Record::updateRecord($moduleAPIName, $recordId);
		
		Record::deleteRecord($moduleAPIName, $recordId);

		Record::getRecords($moduleAPIName);
		
		Record::createRecords($moduleAPIName);
		
		Record::updateRecords($moduleAPIName);
		
		Record::deleteRecords($moduleAPIName, $recordIds);
		
		Record::upsertRecords($moduleAPIName);
		
		Record::getDeletedRecords($moduleAPIName);
		
		Record::searchRecords($moduleAPIName);
		
		Record::convertLead($recordId);
		
		Record::getPhoto($moduleAPIName, $recordId, $destinationFolder);
		
		Record::uploadPhoto($moduleAPIName, $recordId, $absoluteFilePath);
		
		Record::deletePhoto($moduleAPIName, $recordId);
		
		Record::massUpdateRecords($moduleAPIName);
		
		Record::getMassUpdateStatus($moduleAPIName, $jobId);
	}

	public static function RelatedList()
	{
		$moduleAPIName = "Leads";
		
		$relatedListId = "3477xxx";
		
		RelatedList::getRelatedLists($moduleAPIName);
		
		RelatedList::getRelatedList($moduleAPIName, $relatedListId);
	}

	public static function RelatedRecords()
	{
		$moduleAPIName = "Products";
		
		$recordId = "3477xxx";
		
		$relatedListAPIName = "Price_Books";
		
		$relatedRecordId = "3477xxx";
		
		$relatedListIds = array("3477xxx", "3477xxx");

		$destinationFolder =  "/Users/abc-XXX/Desktop";

		RelatedRecords::getRelatedRecords($moduleAPIName, $recordId, $relatedListAPIName);
		
		RelatedRecords::updateRelatedRecords($moduleAPIName, $recordId, $relatedListAPIName);
		
		RelatedRecords::delinkRecords($moduleAPIName, $recordId, $relatedListAPIName, $relatedListIds);
		
		RelatedRecords::getRelatedRecord($moduleAPIName, $recordId, $relatedListAPIName, $relatedRecordId, $destinationFolder);
		
		RelatedRecords::updateRelatedRecord($moduleAPIName, $recordId, $relatedListAPIName, $relatedRecordId);
		
		RelatedRecords::delinkRecord($moduleAPIName, $recordId, $relatedListAPIName, $relatedRecordId);
	}

	public static function Role()
	{
		$roleId = "3477xxx";
		
		Role::getRoles();
		
		Role::getRole($roleId);
	}

	public static function ShareRecords()
	{
		$moduleAPIName = "Leads";
		
		$recordId = "3477xxx";
		
		ShareRecords::getSharedRecordDetails($moduleAPIName, $recordId);
		
		ShareRecords::shareRecord($moduleAPIName, $recordId);
		
		ShareRecords::updateSharePermissions($moduleAPIName, $recordId);
		
		ShareRecords::revokeSharedRecord($moduleAPIName, $recordId);
	}

	public static function Tags()
	{
		$moduleAPIName = "Leads";
		
		$tagId = "3477xxx";
		
		$recordId =  "3477xxx";
				
		$tagNames = array("addtag1", "addtag12");
		
		$recordIds = array("3477xxx", "3477xxx");
		
		$conflictId = "3477xxx";
		
		Tag::getTags($moduleAPIName);
		
		Tag::createTags($moduleAPIName);
		
		Tag::updateTags($moduleAPIName);
		
		Tag::updateTag($moduleAPIName, $tagId);
		
		Tag::deleteTag($tagId);
		
		Tag::mergeTags($tagId, $conflictId);
		
		Tag::addTagsToRecord($moduleAPIName, $recordId, $tagNames);
		
		Tag::removeTagsFromRecord($moduleAPIName, $recordId, $tagNames);
		
		Tag::addTagsToMultipleRecords($moduleAPIName, $recordIds, $tagNames);
		
		Tag::removeTagsFromMultipleRecords($moduleAPIName, $recordIds, $tagNames);
		
		Tag::getRecordCountForTag($moduleAPIName, $tagId);
	}

	public static function Tax()
	{
		$taxId = "3477xxx";
		
		$taxIds = array("3477xxx","3477xxx");
		
		Tax::getTaxes();
		
		Tax::createTaxes();
		
		Tax::updateTaxes();
		
		Tax::deleteTaxes($taxIds);
		
		Tax::getTax($taxId);
		
		Tax::deleteTax($taxId);
	}

	public static function Territory()
	{
		$territoryId = "3477xxx";
		
		Territory::getTerritories();
		
		Territory::getTerritory($territoryId);
	}

	public static function User()
	{
		$userId = "3477xxx";
		
		User::getUsers();
		
		User::createUser();
		
		User::updateUsers();
		
		User::getUser($userId);
		
		User::updateUser($userId);
		
		User::deleteUser($userId);
	}

	public static function VariableGroup()
	{
		$variableGroupName = "General";
		
		$variableGroupId = "3477xxx";
		
		VariableGroup::getVariableGroups();
		
		VariableGroup::getVariableGroupById($variableGroupId);
		
		VariableGroup::getVariableGroupByAPIName($variableGroupName);
	}

	public static function Variable()
	{
		$variableIds = array("3477xxx","3477xxx");
		
		$variableId = "3477xxx";
		
		$variableName = "Variable551";
				
		Variable::getVariables();
		
		Variable::createVariables();
		
		Variable::updateVariables();
		
		Variable::deleteVariables($variableIds);

		Variable::getVariableById($variableId);
		
		Variable::updateVariableById($variableId);
		
		Variable::deleteVariable($variableId);
		
		Variable::getVariableForAPIName($variableName);
		
		Variable::updateVariableByAPIName($variableName);
	}
}

?>