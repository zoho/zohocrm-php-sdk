<?php 
namespace com\zoho\crm\api\modules;

use com\zoho\crm\api\customviews\CustomView;
use com\zoho\crm\api\profiles\Profile;
use com\zoho\crm\api\users\User;
use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\util\Model;

class Module implements Model
{

	private  $name;
	private  $globalSearchSupported;
	private  $kanbanView;
	private  $deletable;
	private  $description;
	private  $creatable;
	private  $filterStatus;
	private  $inventoryTemplateSupported;
	private  $modifiedTime;
	private  $pluralLabel;
	private  $presenceSubMenu;
	private  $triggersSupported;
	private  $id;
	private  $relatedListProperties;
	private  $properties;
	private  $perPage;
	private  $visibility;
	private  $convertable;
	private  $editable;
	private  $emailtemplateSupport;
	private  $profiles;
	private  $filterSupported;
	private  $displayField;
	private  $searchLayoutFields;
	private  $kanbanViewSupported;
	private  $showAsTab;
	private  $webLink;
	private  $sequenceNumber;
	private  $singularLabel;
	private  $viewable;
	private  $apiSupported;
	private  $apiName;
	private  $quickCreate;
	private  $modifiedBy;
	private  $generatedType;
	private  $feedsRequired;
	private  $scoringSupported;
	private  $webformSupported;
	private  $arguments;
	private  $moduleName;
	private  $businessCardFieldLimit;
	private  $customView;
	private  $parentModule;
	private  $territory;
	private  $keyModified=array();

	/**
	 * The method to get the name
	 * @return string A string representing the name
	 */
	public  function getName()
	{
		return $this->name; 

	}

	/**
	 * The method to set the value to name
	 * @param string $name A string
	 */
	public  function setName(string $name)
	{
		$this->name=$name; 
		$this->keyModified['name'] = 1; 

	}

	/**
	 * The method to get the globalSearchSupported
	 * @return bool A bool representing the globalSearchSupported
	 */
	public  function getGlobalSearchSupported()
	{
		return $this->globalSearchSupported; 

	}

	/**
	 * The method to set the value to globalSearchSupported
	 * @param bool $globalSearchSupported A bool
	 */
	public  function setGlobalSearchSupported(bool $globalSearchSupported)
	{
		$this->globalSearchSupported=$globalSearchSupported; 
		$this->keyModified['global_search_supported'] = 1; 

	}

	/**
	 * The method to get the kanbanView
	 * @return bool A bool representing the kanbanView
	 */
	public  function getKanbanView()
	{
		return $this->kanbanView; 

	}

	/**
	 * The method to set the value to kanbanView
	 * @param bool $kanbanView A bool
	 */
	public  function setKanbanView(bool $kanbanView)
	{
		$this->kanbanView=$kanbanView; 
		$this->keyModified['kanban_view'] = 1; 

	}

	/**
	 * The method to get the deletable
	 * @return bool A bool representing the deletable
	 */
	public  function getDeletable()
	{
		return $this->deletable; 

	}

	/**
	 * The method to set the value to deletable
	 * @param bool $deletable A bool
	 */
	public  function setDeletable(bool $deletable)
	{
		$this->deletable=$deletable; 
		$this->keyModified['deletable'] = 1; 

	}

	/**
	 * The method to get the description
	 * @return string A string representing the description
	 */
	public  function getDescription()
	{
		return $this->description; 

	}

	/**
	 * The method to set the value to description
	 * @param string $description A string
	 */
	public  function setDescription(string $description)
	{
		$this->description=$description; 
		$this->keyModified['description'] = 1; 

	}

	/**
	 * The method to get the creatable
	 * @return bool A bool representing the creatable
	 */
	public  function getCreatable()
	{
		return $this->creatable; 

	}

	/**
	 * The method to set the value to creatable
	 * @param bool $creatable A bool
	 */
	public  function setCreatable(bool $creatable)
	{
		$this->creatable=$creatable; 
		$this->keyModified['creatable'] = 1; 

	}

	/**
	 * The method to get the filterStatus
	 * @return bool A bool representing the filterStatus
	 */
	public  function getFilterStatus()
	{
		return $this->filterStatus; 

	}

	/**
	 * The method to set the value to filterStatus
	 * @param bool $filterStatus A bool
	 */
	public  function setFilterStatus(bool $filterStatus)
	{
		$this->filterStatus=$filterStatus; 
		$this->keyModified['filter_status'] = 1; 

	}

	/**
	 * The method to get the inventoryTemplateSupported
	 * @return bool A bool representing the inventoryTemplateSupported
	 */
	public  function getInventoryTemplateSupported()
	{
		return $this->inventoryTemplateSupported; 

	}

	/**
	 * The method to set the value to inventoryTemplateSupported
	 * @param bool $inventoryTemplateSupported A bool
	 */
	public  function setInventoryTemplateSupported(bool $inventoryTemplateSupported)
	{
		$this->inventoryTemplateSupported=$inventoryTemplateSupported; 
		$this->keyModified['inventory_template_supported'] = 1; 

	}

	/**
	 * The method to get the modifiedTime
	 * @return \DateTime An instance of \DateTime
	 */
	public  function getModifiedTime()
	{
		return $this->modifiedTime; 

	}

	/**
	 * The method to set the value to modifiedTime
	 * @param \DateTime $modifiedTime An instance of \DateTime
	 */
	public  function setModifiedTime(\DateTime $modifiedTime)
	{
		$this->modifiedTime=$modifiedTime; 
		$this->keyModified['modified_time'] = 1; 

	}

	/**
	 * The method to get the pluralLabel
	 * @return string A string representing the pluralLabel
	 */
	public  function getPluralLabel()
	{
		return $this->pluralLabel; 

	}

	/**
	 * The method to set the value to pluralLabel
	 * @param string $pluralLabel A string
	 */
	public  function setPluralLabel(string $pluralLabel)
	{
		$this->pluralLabel=$pluralLabel; 
		$this->keyModified['plural_label'] = 1; 

	}

	/**
	 * The method to get the presenceSubMenu
	 * @return bool A bool representing the presenceSubMenu
	 */
	public  function getPresenceSubMenu()
	{
		return $this->presenceSubMenu; 

	}

	/**
	 * The method to set the value to presenceSubMenu
	 * @param bool $presenceSubMenu A bool
	 */
	public  function setPresenceSubMenu(bool $presenceSubMenu)
	{
		$this->presenceSubMenu=$presenceSubMenu; 
		$this->keyModified['presence_sub_menu'] = 1; 

	}

	/**
	 * The method to get the triggersSupported
	 * @return bool A bool representing the triggersSupported
	 */
	public  function getTriggersSupported()
	{
		return $this->triggersSupported; 

	}

	/**
	 * The method to set the value to triggersSupported
	 * @param bool $triggersSupported A bool
	 */
	public  function setTriggersSupported(bool $triggersSupported)
	{
		$this->triggersSupported=$triggersSupported; 
		$this->keyModified['triggers_supported'] = 1; 

	}

	/**
	 * The method to get the id
	 * @return string A string representing the id
	 */
	public  function getId()
	{
		return $this->id; 

	}

	/**
	 * The method to set the value to id
	 * @param string $id A string
	 */
	public  function setId(string $id)
	{
		$this->id=$id; 
		$this->keyModified['id'] = 1; 

	}

	/**
	 * The method to get the relatedListProperties
	 * @return RelatedListProperties An instance of RelatedListProperties
	 */
	public  function getRelatedListProperties()
	{
		return $this->relatedListProperties; 

	}

	/**
	 * The method to set the value to relatedListProperties
	 * @param RelatedListProperties $relatedListProperties An instance of RelatedListProperties
	 */
	public  function setRelatedListProperties(RelatedListProperties $relatedListProperties)
	{
		$this->relatedListProperties=$relatedListProperties; 
		$this->keyModified['related_list_properties'] = 1; 

	}

	/**
	 * The method to get the properties
	 * @return array A array representing the properties
	 */
	public  function getProperties()
	{
		return $this->properties; 

	}

	/**
	 * The method to set the value to properties
	 * @param array $properties A array
	 */
	public  function setProperties(array $properties)
	{
		$this->properties=$properties; 
		$this->keyModified['$properties'] = 1; 

	}

	/**
	 * The method to get the perPage
	 * @return int A int representing the perPage
	 */
	public  function getPerPage()
	{
		return $this->perPage; 

	}

	/**
	 * The method to set the value to perPage
	 * @param int $perPage A int
	 */
	public  function setPerPage(int $perPage)
	{
		$this->perPage=$perPage; 
		$this->keyModified['per_page'] = 1; 

	}

	/**
	 * The method to get the visibility
	 * @return int A int representing the visibility
	 */
	public  function getVisibility()
	{
		return $this->visibility; 

	}

	/**
	 * The method to set the value to visibility
	 * @param int $visibility A int
	 */
	public  function setVisibility(int $visibility)
	{
		$this->visibility=$visibility; 
		$this->keyModified['visibility'] = 1; 

	}

	/**
	 * The method to get the convertable
	 * @return bool A bool representing the convertable
	 */
	public  function getConvertable()
	{
		return $this->convertable; 

	}

	/**
	 * The method to set the value to convertable
	 * @param bool $convertable A bool
	 */
	public  function setConvertable(bool $convertable)
	{
		$this->convertable=$convertable; 
		$this->keyModified['convertable'] = 1; 

	}

	/**
	 * The method to get the editable
	 * @return bool A bool representing the editable
	 */
	public  function getEditable()
	{
		return $this->editable; 

	}

	/**
	 * The method to set the value to editable
	 * @param bool $editable A bool
	 */
	public  function setEditable(bool $editable)
	{
		$this->editable=$editable; 
		$this->keyModified['editable'] = 1; 

	}

	/**
	 * The method to get the emailtemplateSupport
	 * @return bool A bool representing the emailtemplateSupport
	 */
	public  function getEmailtemplateSupport()
	{
		return $this->emailtemplateSupport; 

	}

	/**
	 * The method to set the value to emailtemplateSupport
	 * @param bool $emailtemplateSupport A bool
	 */
	public  function setEmailtemplateSupport(bool $emailtemplateSupport)
	{
		$this->emailtemplateSupport=$emailtemplateSupport; 
		$this->keyModified['emailTemplate_support'] = 1; 

	}

	/**
	 * The method to get the profiles
	 * @return array A array representing the profiles
	 */
	public  function getProfiles()
	{
		return $this->profiles; 

	}

	/**
	 * The method to set the value to profiles
	 * @param array $profiles A array
	 */
	public  function setProfiles(array $profiles)
	{
		$this->profiles=$profiles; 
		$this->keyModified['profiles'] = 1; 

	}

	/**
	 * The method to get the filterSupported
	 * @return bool A bool representing the filterSupported
	 */
	public  function getFilterSupported()
	{
		return $this->filterSupported; 

	}

	/**
	 * The method to set the value to filterSupported
	 * @param bool $filterSupported A bool
	 */
	public  function setFilterSupported(bool $filterSupported)
	{
		$this->filterSupported=$filterSupported; 
		$this->keyModified['filter_supported'] = 1; 

	}

	/**
	 * The method to get the displayField
	 * @return string A string representing the displayField
	 */
	public  function getDisplayField()
	{
		return $this->displayField; 

	}

	/**
	 * The method to set the value to displayField
	 * @param string $displayField A string
	 */
	public  function setDisplayField(string $displayField)
	{
		$this->displayField=$displayField; 
		$this->keyModified['display_field'] = 1; 

	}

	/**
	 * The method to get the searchLayoutFields
	 * @return array A array representing the searchLayoutFields
	 */
	public  function getSearchLayoutFields()
	{
		return $this->searchLayoutFields; 

	}

	/**
	 * The method to set the value to searchLayoutFields
	 * @param array $searchLayoutFields A array
	 */
	public  function setSearchLayoutFields(array $searchLayoutFields)
	{
		$this->searchLayoutFields=$searchLayoutFields; 
		$this->keyModified['search_layout_fields'] = 1; 

	}

	/**
	 * The method to get the kanbanViewSupported
	 * @return bool A bool representing the kanbanViewSupported
	 */
	public  function getKanbanViewSupported()
	{
		return $this->kanbanViewSupported; 

	}

	/**
	 * The method to set the value to kanbanViewSupported
	 * @param bool $kanbanViewSupported A bool
	 */
	public  function setKanbanViewSupported(bool $kanbanViewSupported)
	{
		$this->kanbanViewSupported=$kanbanViewSupported; 
		$this->keyModified['kanban_view_supported'] = 1; 

	}

	/**
	 * The method to get the showAsTab
	 * @return bool A bool representing the showAsTab
	 */
	public  function getShowAsTab()
	{
		return $this->showAsTab; 

	}

	/**
	 * The method to set the value to showAsTab
	 * @param bool $showAsTab A bool
	 */
	public  function setShowAsTab(bool $showAsTab)
	{
		$this->showAsTab=$showAsTab; 
		$this->keyModified['show_as_tab'] = 1; 

	}

	/**
	 * The method to get the webLink
	 * @return string A string representing the webLink
	 */
	public  function getWebLink()
	{
		return $this->webLink; 

	}

	/**
	 * The method to set the value to webLink
	 * @param string $webLink A string
	 */
	public  function setWebLink(string $webLink)
	{
		$this->webLink=$webLink; 
		$this->keyModified['web_link'] = 1; 

	}

	/**
	 * The method to get the sequenceNumber
	 * @return int A int representing the sequenceNumber
	 */
	public  function getSequenceNumber()
	{
		return $this->sequenceNumber; 

	}

	/**
	 * The method to set the value to sequenceNumber
	 * @param int $sequenceNumber A int
	 */
	public  function setSequenceNumber(int $sequenceNumber)
	{
		$this->sequenceNumber=$sequenceNumber; 
		$this->keyModified['sequence_number'] = 1; 

	}

	/**
	 * The method to get the singularLabel
	 * @return string A string representing the singularLabel
	 */
	public  function getSingularLabel()
	{
		return $this->singularLabel; 

	}

	/**
	 * The method to set the value to singularLabel
	 * @param string $singularLabel A string
	 */
	public  function setSingularLabel(string $singularLabel)
	{
		$this->singularLabel=$singularLabel; 
		$this->keyModified['singular_label'] = 1; 

	}

	/**
	 * The method to get the viewable
	 * @return bool A bool representing the viewable
	 */
	public  function getViewable()
	{
		return $this->viewable; 

	}

	/**
	 * The method to set the value to viewable
	 * @param bool $viewable A bool
	 */
	public  function setViewable(bool $viewable)
	{
		$this->viewable=$viewable; 
		$this->keyModified['viewable'] = 1; 

	}

	/**
	 * The method to get the aPISupported
	 * @return bool A bool representing the apiSupported
	 */
	public  function getAPISupported()
	{
		return $this->apiSupported; 

	}

	/**
	 * The method to set the value to aPISupported
	 * @param bool $apiSupported A bool
	 */
	public  function setAPISupported(bool $apiSupported)
	{
		$this->apiSupported=$apiSupported; 
		$this->keyModified['api_supported'] = 1; 

	}

	/**
	 * The method to get the aPIName
	 * @return string A string representing the apiName
	 */
	public  function getAPIName()
	{
		return $this->apiName; 

	}

	/**
	 * The method to set the value to aPIName
	 * @param string $apiName A string
	 */
	public  function setAPIName(string $apiName)
	{
		$this->apiName=$apiName; 
		$this->keyModified['api_name'] = 1; 

	}

	/**
	 * The method to get the quickCreate
	 * @return bool A bool representing the quickCreate
	 */
	public  function getQuickCreate()
	{
		return $this->quickCreate; 

	}

	/**
	 * The method to set the value to quickCreate
	 * @param bool $quickCreate A bool
	 */
	public  function setQuickCreate(bool $quickCreate)
	{
		$this->quickCreate=$quickCreate; 
		$this->keyModified['quick_create'] = 1; 

	}

	/**
	 * The method to get the modifiedBy
	 * @return User An instance of User
	 */
	public  function getModifiedBy()
	{
		return $this->modifiedBy; 

	}

	/**
	 * The method to set the value to modifiedBy
	 * @param User $modifiedBy An instance of User
	 */
	public  function setModifiedBy(User $modifiedBy)
	{
		$this->modifiedBy=$modifiedBy; 
		$this->keyModified['modified_by'] = 1; 

	}

	/**
	 * The method to get the generatedType
	 * @return Choice An instance of Choice
	 */
	public  function getGeneratedType()
	{
		return $this->generatedType; 

	}

	/**
	 * The method to set the value to generatedType
	 * @param Choice $generatedType An instance of Choice
	 */
	public  function setGeneratedType(Choice $generatedType)
	{
		$this->generatedType=$generatedType; 
		$this->keyModified['generated_type'] = 1; 

	}

	/**
	 * The method to get the feedsRequired
	 * @return bool A bool representing the feedsRequired
	 */
	public  function getFeedsRequired()
	{
		return $this->feedsRequired; 

	}

	/**
	 * The method to set the value to feedsRequired
	 * @param bool $feedsRequired A bool
	 */
	public  function setFeedsRequired(bool $feedsRequired)
	{
		$this->feedsRequired=$feedsRequired; 
		$this->keyModified['feeds_required'] = 1; 

	}

	/**
	 * The method to get the scoringSupported
	 * @return bool A bool representing the scoringSupported
	 */
	public  function getScoringSupported()
	{
		return $this->scoringSupported; 

	}

	/**
	 * The method to set the value to scoringSupported
	 * @param bool $scoringSupported A bool
	 */
	public  function setScoringSupported(bool $scoringSupported)
	{
		$this->scoringSupported=$scoringSupported; 
		$this->keyModified['scoring_supported'] = 1; 

	}

	/**
	 * The method to get the webformSupported
	 * @return bool A bool representing the webformSupported
	 */
	public  function getWebformSupported()
	{
		return $this->webformSupported; 

	}

	/**
	 * The method to set the value to webformSupported
	 * @param bool $webformSupported A bool
	 */
	public  function setWebformSupported(bool $webformSupported)
	{
		$this->webformSupported=$webformSupported; 
		$this->keyModified['webform_supported'] = 1; 

	}

	/**
	 * The method to get the arguments
	 * @return array A array representing the arguments
	 */
	public  function getArguments()
	{
		return $this->arguments; 

	}

	/**
	 * The method to set the value to arguments
	 * @param array $arguments A array
	 */
	public  function setArguments(array $arguments)
	{
		$this->arguments=$arguments; 
		$this->keyModified['arguments'] = 1; 

	}

	/**
	 * The method to get the moduleName
	 * @return string A string representing the moduleName
	 */
	public  function getModuleName()
	{
		return $this->moduleName; 

	}

	/**
	 * The method to set the value to moduleName
	 * @param string $moduleName A string
	 */
	public  function setModuleName(string $moduleName)
	{
		$this->moduleName=$moduleName; 
		$this->keyModified['module_name'] = 1; 

	}

	/**
	 * The method to get the businessCardFieldLimit
	 * @return int A int representing the businessCardFieldLimit
	 */
	public  function getBusinessCardFieldLimit()
	{
		return $this->businessCardFieldLimit; 

	}

	/**
	 * The method to set the value to businessCardFieldLimit
	 * @param int $businessCardFieldLimit A int
	 */
	public  function setBusinessCardFieldLimit(int $businessCardFieldLimit)
	{
		$this->businessCardFieldLimit=$businessCardFieldLimit; 
		$this->keyModified['business_card_field_limit'] = 1; 

	}

	/**
	 * The method to get the customView
	 * @return CustomView An instance of CustomView
	 */
	public  function getCustomView()
	{
		return $this->customView; 

	}

	/**
	 * The method to set the value to customView
	 * @param CustomView $customView An instance of CustomView
	 */
	public  function setCustomView(CustomView $customView)
	{
		$this->customView=$customView; 
		$this->keyModified['custom_view'] = 1; 

	}

	/**
	 * The method to get the parentModule
	 * @return Module An instance of Module
	 */
	public  function getParentModule()
	{
		return $this->parentModule; 

	}

	/**
	 * The method to set the value to parentModule
	 * @param Module $parentModule An instance of Module
	 */
	public  function setParentModule(Module $parentModule)
	{
		$this->parentModule=$parentModule; 
		$this->keyModified['parent_module'] = 1; 

	}

	/**
	 * The method to get the territory
	 * @return Territory An instance of Territory
	 */
	public  function getTerritory()
	{
		return $this->territory; 

	}

	/**
	 * The method to set the value to territory
	 * @param Territory $territory An instance of Territory
	 */
	public  function setTerritory(Territory $territory)
	{
		$this->territory=$territory; 
		$this->keyModified['territory'] = 1; 

	}

	/**
	 * The method to check if the user has modified the given key
	 * @param string $key A string
	 * @return int A int representing the modification
	 */
	public  function isKeyModified(string $key)
	{
		if(((array_key_exists($key, $this->keyModified))))
		{
			return $this->keyModified[$key]; 

		}
		return null; 

	}

	/**
	 * The method to mark the given key as modified
	 * @param string $key A string
	 * @param int $modification A int
	 */
	public  function setKeyModified(string $key, int $modification)
	{
		$this->keyModified[$key] = $modification; 

	}
} 
