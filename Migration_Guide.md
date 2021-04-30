# Migrating from Zoho CRM PHP SDK 2.x to 3.x

1. [Organization](#organization)
    - [Get OrganizationDetails](#get-organizationdetails)
2. [User](#user)
    - [Get Current User](#get-current-user)
    - [Get User](#get-user)
    - [Create User](#create-user)
    - [Update User](#update-user)
    - [Delete User](#delete-user)
3. [Profiles](#profiles)
    - [Get All Profiles](#get-all-profiles)
    - [Get Profile](#get-profile)
4. [Roles](#roles)
    - [Get All Roles](#get-all-roles)
    - [Get Role](#get-role)
5. [Taxes](#taxes)
    - [Get Org Taxes](#get-org-taxes)
    - [Get Org Tax Data](#get-org-tax-data)
    - [Create Org Tax](#create-org-tax)
    - [Update Org Tax](#update-org-tax)
    - [Delete Org Taxes](#delete-org-taxes)
    - [Delete Org Tax](#delete-org-tax)
6. [Notes](#notes)
    - [Get Notes](#get-notes)
    - [Create Notes](#create-notes)
    - [Delete Notes](#delete-notes)
    - [Add Note](#add-a-note)
    - [Update Note](#update-a-note)
    - [Delete Note](#delete-a-note)
7. [Variables](#variables)
    - [Get Variables](#get-variables)
    - [Create Variables](#create-variables)
    - [Update Variables](#update-variables)
    - [Get Variable](#get-a-variable)
    - [Update Variable](#update-a-variable)
    - [Delete Variable](#Delete-a-variable)
8. [VariableGroups](#variablegroups)
    - [Get Variable Groups](#get-variable-groups)
    - [Get Variable Group](#get-a-variable-group)
9. [Fields](#fields)
    - [Get All Fields](#get-all-fields)
    - [Get Field Details](#get-field-details)
10. [Layouts](#layouts)
    - [Get All Layouts](#get-all-layouts)
    - [Get Layout Details](#get-layout-details)
11. [CustomViews](#customviews)
    - [Get All CustomViews](#get-all-customviews)
    - [Get Custom View Details](#get-custom-view-details)
12. [RelatedLists](#relatedlists)
    - [Get All Related Lists](#get-all-related-lists)
    - [Get Related List Details](#get-related-list-details)
13. [Records](#records)
    - [Get List of Records](#get-list-of-records)
    - [Get a Record](#get-a-record)
    - [Search Records](#search-records)
    - [Update Records](#update-records)
    - [Create Records](#create-records)
    - [Delete Records](#delete-records)
    - [Get Deleted Records](#get-deleted-records)
    - [Upsert Records](#upsert-records)
    - [Mass Update Records](#mass-update-records)
    - [Create Record](#create-a-record)
    - [Update Record](#update-a-record)
    - [Delete Record](#delete-a-record)
    - [Convert Record](#convert-a-record)
    - [Upload a Photo](#upload-a-photo)
    - [Download a Photo](#download-a-photo)
    - [Delete a Photo](#delete-a-photo)
14. [Tags](#tags)
    - [Get Tags](#get-tags)
    - [Get Tag Count](#get-tag-count)
    - [Create Tags](#create-tags)
    - [Update Tags](#update-tags)
    - [Add Tags to Records](#add-tags-to-records)
    - [Remove Tags from Records](#remove-tags-from-records)
    - [Add Tags to Record](#add-tags-to-record)
    - [Remove Tags from Record](#remove-tags-from-record)
15. [Attachments](#attachments)
    - [Get Attachments](#get-attachments)
    - [Upload an Attachment](#upload-an-attachment)
    - [Upload Link as an Attachment](#upload-link-as-an-attachment)
    - [Download an Attachment](#download-an-attachment)
    - [Delete an Attachment](#delete-an-attachment)
16. [RelatedRecords](#relatedrecords)
    - [Update Related Record](#update-a-related-record)
    - [Remove Relation between Records](#remove-relation-between-records)

## Organization

### Get OrganizationDetails

- v2.x.x

    ```php
    $rest = ZCRMRestClient::getInstance();//to get the rest client
    $orgIns = $rest->getOrganizationDetails()->getData();//to get the organization in form of ZCRMOrganization instance
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/restclient-sample.html?src=organization_details)

- v3.x.x

    ```php
    //Get instance of OrgOperations Class
    $orgOperations = new OrgOperations();
    //Call getOrganization method
    $response = $orgOperations->getOrganization();
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/organization-samples.html?src=get_org)

## User

### Get Current User

- v2.x.x

    ```php
    $rest = ZCRMRestClient::getInstance();//to get the rest client
    $users = $rest->getCurrentUser()->getData();//to get the users in form of ZCRMUser instances array
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/restclient-sample.html?src=current_user)

- v3.x.x

    ```php
    //Get instance of UsersOperations Class
    $usersOperations = new UsersOperations();
    //Get instance of ParameterMap Class
    $paramInstance = new ParameterMap();
    $paramInstance->add(GetUsersParam::type(), "CurrentUser"); // AllUsers, ActiveUsers, DeactiveUsers, ConfirmedUsers, NotConfirmedUsers, DeletedUsers, ActiveConfirmedUsers, AdminUsers, ActiveConfirmedAdmins
    $headerInstance = new HeaderMap();
    //Call getUsers method that takes paramInstance as parameter
    $response = $usersOperations->getUsers($paramInstance, $headerInstance);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/user-samples.html?src=get_users)

### Get User

- v2.x.x

    ```php
    $orgIns = ZCRMRestClient::getOrganizationInstance(); // to get the organization instance
    $responseIns = $orgIns->getUser("3524033191017");//to get the user
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/organization-sample.html?src=user_details)

- v3.x.x

    ```php
    //Get instance of UsersOperations Class
    $usersOperations = new UsersOperations();
    $headerInstance = new HeaderMap();
    //Call getUser method that takes userId as parameter
    $response = $usersOperations->getUser($userId, $headerInstance);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/user-samples.html?src=get_user)

### Create User

- v2.x.x

    ```php
    $orgIns = ZCRMRestClient::getOrganizationInstance(); // to get the organization instance
    $user = ZCRMUser::getInstance(NULL, NULL);//to get the user instance
    $user->setLastName("subject");//to set the last name of the user
    $user->setFirstName("test");//to set the first name of the user
    $user->setEmail("test1@gmail.com");//to set the email id of the user
    $role=ZCRMRole::getInstance("{role_id}", "{role_name}");//to get the role
    $user->setRole($role);//to get the role of the user
    $profile=ZCRMProfile::getInstance("{profile_id}", "{profile_name}");//to get the profile
    $user->setProfile($profile);//to set the profile of the user
    $responseIns = $orgIns->createUser($user);//to create the user
    ```

    [sample code](zoho.com/crm/developer/docs/php-sdk/organization-sample.html?src=create_user)

- v3.x.x

    ```php
    //Get instance of UsersOperations Class
    $usersOperations = new UsersOperations();
    //Get instance of BodyWrapper Class that will contain the request body
    $request = new RequestWrapper();
    //List of User instances
    $userList = array();
    $userClass = "com\zoho\crm\api\users\User";
    //Get instance of User Class
    $user1 = new $userClass();
    $role = new Role();
    $role->setId("347706126008");
    $user1->setRole($role);
    $user1->setFirstName("TestUser");
    $user1->setEmail("testuser@zoho.com");
    $profile = new Profile();
    $profile->setId("347706126014");
    $user1->setProfile($profile);
    $user1->setLastName("12");
    array_push($userList, $user1);
    $request->setUsers($userList);
    //Call createUser method that takes BodyWrapper class instance as parameter
    $response = $usersOperations->createUser($request);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/user-samples.html?src=add_users)

### Update User

- v2.x.x

    ```php
    $orgIns = ZCRMRestClient::getOrganizationInstance(); // to get the organization instance
    $user = ZCRMUser::getInstance("{user_id}", "{user_name}");//to get the user instance
    $user->setId("{user_id}");//to set the id of the user
    $user->setFax("321432423423");//to set the fax number of the user
    $user->setMobile("4234234232");//to set the mobile number of the user
    $user->setPhone("2342342342");//to set the phone number of the user
    $user->setStreet("sddsfdsfd");//to set the street name of the user
    $user->setAlias("test");//to set the alias of the user
    $user->setWebsite("www.zoho.com");//to set the website of the user
    $user->setCity("chennai");//to set the city of the user
    $user->setCountry("India");//to set the country of the user
    $user->setState("Tamil nadu");//to set the state of the user
    $user->setZip("6000010");//to set the zip code of the user
    $responseIns = $orgIns->updateUser($user);//to update the user
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/organization-sample.html?src=update_user)

- v3.x.x

    ```php
    //Get instance of UsersOperations Class
    $usersOperations = new UsersOperations();
    //Get instance of BodyWrapper Class that will contain the request body
    $request = new BodyWrapper();
    //List of User instances
    $userList = array();
    $userClass = "com\zoho\crm\api\users\User";
    //Get instance of User Class
    $user1 = new $userClass();
    $role = new Role();
    $role->setId("347706126008");
    $user1->setRole($role);
    $user1->setCountryLocale("en_US");
    array_push($userList, $user1);
    $request->setUsers($userList);
    //Call updateUser method that takes BodyWrapper instance and userId as parameter
    $response = $usersOperations->updateUser($userId, $request);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/user-samples.html?src=update_user)

### Delete User

- v2.x.x

    ```php
    $orgIns = ZCRMRestClient::getOrganizationInstance(); // to get the organization instance
    $responseIns = $orgIns->deleteUser("{user_id}");//to delete the user
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/organization-sample.html?src=delete_user)

- v3.x.x

    ```php
    //Get instance of UsersOperations Class
    $usersOperations = new UsersOperations();
    //Call deleteUser method that takes userId as parameter
    $response = $usersOperations->deleteUser($userId);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/user-samples.html?src=delete_user)

## Profiles

### Get All Profiles

- v2.x.x

    ```php
    $orgIns = ZCRMRestClient::getOrganizationInstance(); // to get the organization instance
    $response = $orgIns->getAllProfiles();//to get the profiles
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/organization-sample.html?src=all_profiles)

- v3.x.x

    ```php
    //Get instance of ProfilesOperations Class
    $profilesOperations = new ProfilesOperations();
    //Call getProfiles method
    $response = $profilesOperations->getProfiles();
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/profile-samples.html?src=get_profiles)

### Get Profile

- v2.x.x

    ```php
    $orgIns = ZCRMRestClient::getOrganizationInstance(); // to get the organization instance
    $response = $orgIns->getProfile("{profile_id}");//to get the profile
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/organization-sample.html?src=profile_data)

- v3.x.x

    ```php
    //Get instance of ProfilesOperations Class
    $profilesOperations = new ProfilesOperations();
    //Call getProfile method that takes profileId as parameter
    $response = $profilesOperations->getProfile($profileId);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/profile-samples.html?src=get_profile)

## Roles

### Get All Roles

- v2.x.x

    ```php
    $orgIns = ZCRMRestClient::getOrganizationInstance(); // to get the organization instance
    $response = $orgIns->getAllRoles();//to get the roles of the organization
    $roles = $response->getData();//to get the roles in form of array of ZCRMRole instances
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/organization-sample.html?src=all_roles)

- v3.x.x

    ```php
    //Get instance of RolesOperations Class
    $rolesOperations = new RolesOperations();
    //Call getRoles method
    $response = $rolesOperations->getRoles();
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/role-samples.html?src=get_roles)

### Get Role

- v2.x.x

    ```php
    $orgIns = ZCRMRestClient::getOrganizationInstance(); // to get the organization instance
    $response = $orgIns->getRole("{role_id}");//to get the role of the organization
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/organization-sample.html?src=role_data)

- v3.x.x

    ```php
    //Get instance of RolesOperations Class
    $rolesOperations = new RolesOperations();
    //Call getRoles method
    $response = $rolesOperations->getRole($roleId);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/role-samples.html?src=get_role)

## Taxes

### Get Org Taxes

- v2.x.x

    ```php
    $orgIns = ZCRMRestClient::getOrganizationInstance(); // to get the organization instance
    $orgTaxes = $orgIns->getOrganizationTaxes();
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/organization-sample.html?src=get_org_taxes)

- v3.x.x

    ```php
    //Get instance of TaxesOperations Class
    $taxesOperations = new TaxesOperations();
    //Call getTaxes method
    $response = $taxesOperations->getTaxes();
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/tax-samples.html?src=get_taxes)

### Get Org Tax Data

- v2.x.x

    ```php
    $orgIns = ZCRMRestClient::getOrganizationInstance(); // to get the organization instance
    $orgTax = $orgIns->getOrganizationTax("{organization_tax_id}")->getData();
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/organization-sample.html?src=get_org_tax)

- v3.x.x

    ```php
    //Get instance of TaxesOperations Class
    $taxesOperations = new TaxesOperations();
    //Call getTax method that takes taxId as parameter
    $response = $taxesOperations->getTax($taxId);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/tax-samples.html?src=get_tax)

### Create Org Tax

- v2.x.x

    ```php
    $orgIns = ZCRMRestClient::getOrganizationInstance(); // to get the organization instance
    $orgTax = ZCRMOrgTax::getInstance("fsdf", NULL);
    $orgTax->setValue("34");
    $orgTaxInstances = array();
    array_push($orgTaxInstances, $orgTax);
    $responseIns = $orgIns->createOrganizationTaxes($orgTaxInstances);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/organization-sample.html?src=create_org_tax)

- v3.x.x

    ```php
    //Get instance of TaxesOperations Class
    $taxesOperations = new TaxesOperations();
    //Get instance of BodyWrapper Class that will contain the request body
    $request = new BodyWrapper();
    //List of Tax instances
    $taxList = array();
    $tagClass = 'com\zoho\crm\api\taxes\Tax';
    //Get instance of Tax Class
    $tax1 = new $tagClass();
    $tax1->setName("MyTax22");
    $tax1->setSequenceNumber(2);
    $tax1->setValue(10.0);
    array_push($taxList, $tax1);
    $tax1 = new $tagClass();
    $tax1->setName("MyTax23");
    $tax1->setValue(12.0);
    array_push($taxList, $tax1);
    $request->setTaxes($taxList);
    //Call createTaxes method that takes BodyWrapper class instance as parameter
    $response = $taxesOperations->createTaxes($request);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/tax-samples.html?src=create_taxess)

### Update Org Tax

- v2.x.x

    ```php
    $orgIns = ZCRMRestClient::getOrganizationInstance(); // to get the organization instance
    $orgTax = ZCRMOrgTax::getInstance("SalesTax","{org_tax_id}");
    $orgTax->setValue("33");
    $orgTaxInstances = array();
    array_push($orgTaxInstances, $orgTax);
    $responseIns = $orgIns->updateOrganizationTaxes($orgTaxInstances);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/organization-sample.html?src=update_org_tax)

- v3.x.x

    ```php
    //Get instance of TaxesOperations Class
    $taxesOperations = new TaxesOperations();
    //Get instance of BodyWrapper Class that will contain the request body
    $request = new BodyWrapper();
    //List of Tax instances
    $taxList = array();
    $taxClass = 'com\zoho\crm\api\taxes\Tax';
    //Get instance of Tax Class
    $tax1 = new $taxClass();
    $tax1->setId("34770616499001");
    $tax1->setName("MyTax1134");
    $tax1->setSequenceNumber(1);
    $tax1->setValue(15.0);
    array_push($taxList, $tax1);
    //Get instance of Tax Class
    $tax1 = new $taxClass();
    $tax1->setId("34770616499002");
    $tax1->setValue(25.0);
    array_push($taxList, $tax1);
    $tax1 = new $taxClass();
    $tax1->setId("3477061339001");
    $tax1->setSequenceNumber(2);s
    array_push($taxList, $tax1);
    $request->setTaxes($taxList);
    //Call updateTaxes method that takes BodyWrapper instance as parameter
    $response = $taxesOperations->updateTaxes($request);
    ```

    [sample code](zoho.com/crm/developer/docs/php-sdk/v3/tax-samples.html?src=update_taxes)

### Delete Org Taxes

- v2.x.x

    ```php
    $orgIns = ZCRMRestClient::getOrganizationInstance(); // to get the organization instance
    $responseIns = $orgIns->deleteOrganizationTaxes($orgTaxids);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/organization-sample.html?src=delete_org_taxes)

- v3.x.x

    ```php
    //Get instance of TaxesOperations Class
    $taxesOperations = new TaxesOperations();
    //Get instance of ParameterMap Class
    $paramInstance = new ParameterMap();
    foreach($taxIds as $taxId)
    {
        $paramInstance->add(DeleteTaxesParam::ids(), $taxId);
    }
    //Call deleteTaxes method that takes paramInstance as parameter
    $response = $taxesOperations->deleteTaxes($paramInstance);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/tax-samples.html?src=delete_taxes)

### Delete Org Tax

- v2.x.x

    ```php
    $orgIns = ZCRMRestClient::getOrganizationInstance(); // to get the organization instance
    $responseIn = $orgIns->deleteOrganizationTax("{org_tax_id}");
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/organization-sample.html?src=delete_org_tax)

- v3.x.x

    ```php
    //Get instance of TaxesOperations Class
    $taxesOperations = new TaxesOperations();
    //Call deleteTaxes method that takes taxId as parameter
    $response = $taxesOperations->deleteTax($taxId);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/tax-samples.html?src=delete_tax)

## Notes

### Get Notes

- v2.x.x

    ```php
    $org = ZCRMOrganization::getInstance();
    /* For VERSION <=2.0.6  $notes = $org->getNotes()->getData(); // to get the notes in form of ZCRMNote instances array */
    $param_map=array("page"=>"20","per_page"=>"200"); // key-value pair containing all the parameters - optional
    $header_map = array("if-modified-since"=>"2019-11-10T15:26:49+05:30"); // key-value pair containing all the headers - optional
    $response = $orgIns->getNotes($param_map,$header_map); // to get all the notes
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/organization-sample.html?src=get_notes)

- v3.x.x

    ```php
    //Get instance of NotesOperations Class
    $notesOperations = new NotesOperations();
    //Get instance of ParameterMap Class
    $paramInstance = new ParameterMap();
    $paramInstance->add(GetNotesParam::page(), 1);
    //$paramInstance->add(GetNotesParam::perPage(), 1);
    //Get instance of HeaderMap Class
    $headerInstance = new HeaderMap();
    $headerInstance->add(GetNotesHeader::IfModifiedSince(), date_create("2019-05-07T15:32:24")->setTimezone(new \DateTimeZone(date_default_timezone_get())));
    //Call getNotes method that takes paramInstance and headerInstance as parameters
    $response = $notesOperations->getNotes($paramInstance, $headerInstance);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/notes-samples.html?src=get_notes)

### Create Notes

- v2.x.x

    ```php
    $org = ZCRMOrganization::getInstance();
    $record = ZCRMRecord::getInstance("Products", "35240333352001");
    $noteIns = ZCRMNote::getInstance($record, NULL); // to get the note instance
    $noteIns->setTitle("Title_API1"); // to set the note title
    $noteIns->setContent("This is test content"); // to set the note content
    $noteIns1 = ZCRMNote::getInstance($record, NULL); // to get another note instance
    $noteIns1->setTitle("Title_API1"); // to set the note title
    $noteIns1->setContent("This is test content");
    $noteInstances=[$noteIns,$noteIns1];
    $responseIn=$org->createNotes($noteInstances);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/organization-sample.html?src=create_notes)

- v3.x.x

    ```php
    //Get instance of NotesOperations Class
    $notesOperations = new NotesOperations();
    //Get instance of BodyWrapper Class that will contain the request body
    $bodyWrapper = new BodyWrapper();
    //List of Note instances
    $notes = array();
    for($i = 1; $i <5; $i++)
    {
        $note->setNoteTitle("Contacted");
        //Set NoteContent of the Note
        $note->setNoteContent("Need to do further tracking");
        //Get instance of Record Class
        $parentRecord = new Record();
        //Set ID of the Record
        $parentRecord->setId("34770615702002");
        //Set ParentId of the Note
        $note->setParentId($parentRecord);
        //Set SeModule of the Record
        $note->setSeModule("Leads");
        //Add Note instance to the list
        array_push($notes, $note);
    }
    //Set the list to notes in BodyWrapper instance
    $bodyWrapper->setData($notes);
    //Call createNotes method that takes BodyWrapper instance as parameter
    $response = $notesOperations->createNotes($bodyWrapper);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/notes-samples.html?src=create_notes)

### Delete Notes

- v2.x.x

    ```php
    $org = ZCRMOrganization::getInstance();
    $noteIds = ["35240333392002","35240333392001"];
    $responseIn = $org->deleteNotes($noteIds);
    ```

    [sample code](zoho.com/crm/developer/docs/php-sdk/organization-sample.html?src=delete_notes)

- v3.x.x

    ```php
    //Get instance of NotesOperations Class
    $notesOperations = new NotesOperations();
    //Get instance of ParameterMap Class
    $paramInstance = new ParameterMap();
    foreach($notesID as $id)
    {
        $paramInstance->add(DeleteNotesParam::ids(), $id);
    }
    //Call deleteNotes method that takes paramInstance as parameter
    $response = $notesOperations->deleteNotes($paramInstance);
    ```

    [sample code](zoho.com/crm/developer/docs/php-sdk/v3/notes-samples.html?src=delete_notes)

### Add a Note

- v2.x.x

    ```php
    $record = ZCRMRestClient::getInstance()->getRecordInstance("{module_api_name}", "{record_id}"); // To get record instance
    $noteIns = ZCRMNote::getInstance($record, null); // to get the note instance
    $noteIns->setTitle("Title_API1"); // to set the note title
    $noteIns->setContent("This is test content"); // to set the note content
    $responseIns = $record->addNote($noteIns); // to add the note
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/record-samples.html?src=add_note)

- v3.x.x

  - [Create Notes](#create-notes)

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/notes-samples.html?src=create_notes)

### Update a Note

- v2.x.x

    ```php
    $record = ZCRMRestClient::getInstance()->getRecordInstance("{moduel_api_name}", "{record_id}"); // To get record instance
    $noteIns = ZCRMNote::getInstance($record, "{note_id}"); // to get the note instance
    $noteIns->setTitle("Title_API1"); // to set the title of the note
    $noteIns->setContent("This is test cooontent"); // to set the content of the note
    $responseIns = $record->updateNote($noteIns); // to update the note
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/record-samples.html?src=update_note)

- v3.x.x

    ```php
    //Get instance of NotesOperations Class
    $notesOperations = new NotesOperations();
    //Get instance of BodyWrapper Class that will contain the request body
    $bodyWrapper = new BodyWrapper();
    //List of Note instances
    $notes = array();
    $nodeClass = 'com\zoho\crm\api\notes\Note';
    $note = new $nodeClass();
    //Set Note_Title of the Note
    $note->setNoteTitle("Contacted12");
    //Set NoteContent of the Note
    $note->setNoteContent("Need to do further tracking12");
    //Add Note instance to the list
    array_push($notes, $note);
    //Set the list to notes in BodyWrapper instance
    $bodyWrapper->setData($notes);
    //Call updateNote method that takes BodyWrapper instance and noteId as parameter
    $response = $notesOperations->updateNote($noteId,$bodyWrapper);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/notes-samples.html?src=update_note)

### Delete a Note

- v2.x.x

    ```php
    $record = ZCRMRestClient::getInstance()->getRecordInstance("{module_api_name}", "{record_id}"); // To get record instance
    $noteIns = ZCRMNote::getInstance($record, "{note_id}"); // to get the note instance
    $responseIns = $record->deleteNote($noteIns); // to delete the note
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/record-samples.html?src=delete_note)

- v3.x.x

    ```php
    //Get instance of NotesOperations Class
    $notesOperations = new NotesOperations();
    //Call deleteNotes method that takes BodyWrapper instance as parameter
    $response = $notesOperations->deleteNote($noteID);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/notes-samples.html?src=delete_note)

## Variables

### Get Variables

- v2.x.x

    ```php
    $org_ins = ZCRMOrganization::getInstance();
    $variable_instances = $org_ins->getVariables();
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/organization-sample.html?src=get_variables)

- v3.x.x

    ```php
    //Get instance of VariablesOperations Class
    $variablesOperations = new VariablesOperations();
    //Get instance of ParameterMap Class
    $paramInstance = new ParameterMap();
    $paramInstance->add(GetVariablesParam::group(), "General");
    //Call getVariables method that takes paramInstance as parameter
    $response = $variablesOperations->getVariables($paramInstance);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/variables-samples.html?src=get_variables)

### Create Variables

- v2.x.x

    ```php
    $variable_array =array() ;
    $org_ins=ZCRMOrganization::getInstance();
    $variable_ins=ZCRMVariable::getInstance();//to get the rest client
    $variable_ins->setName("v");
    $variable_ins->setType("integer");
    $variable_ins->setValue("2");
    $variable_group = ZCRMVariableGroup::getInstance();
    $variable_group->setId("3524033231001");
    $variable_group->setApiName("General");
    $variable_ins->setVariableGroup($variable_group);
    $variable_ins->setDescription("automated sdk");
    array_push($variable_array,$variable_ins);
    $variable_ins1=ZCRMVariable::getInstance();//to get the rest client
    $variable_ins1->setName("v");
    $variable_ins1->setType("integer");
    $variable_ins1->setValue("2");
    $variable_group = ZCRMVariableGroup::getInstance();
    $variable_group->setId("3524033231001");
    $variable_group->setApiName("General");
    $variable_ins1->setVariableGroup($variable_group);
    $variable_ins1->setDescription("automated sdk");
    array_push($variable_array,$variable_ins1);
    $responseIn=$org_ins->createVariables($variable_array);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/organization-sample.html?src=create_variables)

- v3.x.x

    ```php
    //Get instance of VariablesOperations Class
    $variablesOperations = new VariablesOperations();
    //Get instance of BodyWrapper Class that will contain the request body
    $request = new BodyWrapper();
    //List of Variable instances
    $variableList = array();
    $variableClass = 'com\zoho\crm\api\variables\Variable';
    //Get instance of Variable Class
    $variable1 = new $variableClass();
    $variable1->setName("asdasd");
    $variable1->setAPIName("sdsd");
    $variableGroup = new VariableGroup();
    $variableGroup->setName("General");
    $variableGroup->setId("347706189001");
    $variable1->setVariableGroup($variableGroup);
    $variable1->setType("integer");
    $variable1->setValue("42");
    $variable1->setDescription("This denotes variable 5 description");
    array_push($variableList, $variable1);
    $variable1 = new $variableClass();
    $variable1->setName("Variable661");
    $variable1->setAPIName("Variable661");
    $variableGroup = new VariableGroup();
    $variableGroup->setName("General");
    $variable1->setVariableGroup($variableGroup);
    $variable1->setType("text");
    $variable1->setValue("H2ello");
    $variable1->setDescription("This denotes variable 6 description");
    array_push($variableList, $variable1);
    $request->setVariables($variableList);
    //Call createVariables method that takes BodyWrapper instance as parameter
    $response = $variablesOperations->createVariables($request);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/variables-samples.html?src=create_variables)

### Update Variables

- v2.x.x

    ```php
    $variable_array =array() ;
    $org_ins=ZCRMOrganization::getInstance();
    $variable_ins=ZCRMVariable::getInstance();//to get the rest client
    $variable_ins->setId("3524033999002");
    $variable_ins->setName("x");
    $variable_ins->setType("integer");
    $variable_ins->setValue("2");
    $variable_group = ZCRMVariableGroup::getInstance();
    $variable_group->setId("352403301001");
    $variable_group->setApiName("General");
    $variable_ins->setVariableGroup($variable_group);
    $variable_ins->setDescription("automated sdk");
    array_push($variable_array,$variable_ins);
    $variable_ins1=ZCRMVariable::getInstance();//to get the rest client
    $variable_ins1->setName("y");
    $variable_ins1->setId("35240331");
    $variable_ins1->setType("integer");
    $variable_ins1->setValue("2");
    $variable_group = ZCRMVariableGroup::getInstance();
    $variable_group->setId("3524031001");
    $variable_group->setApiName("General");
    $variable_ins1->setVariableGroup($variable_group);
    $variable_ins1->setDescription("automated sdk");
    array_push($variable_array,$variable_ins1);
    $responseIn=$org_ins->updateVariables($variable_array);
    ```

    [sample code](zoho.com/crm/developer/docs/php-sdk/organization-sample.html?src=update_variables)

- v3.x.x

    ```php
    //Get instance of VariablesOperations Class
    $variablesOperations = new VariablesOperations();
    //Get instance of BodyWrapper Class that will contain the request body
    $request = new BodyWrapper();
    //List of Variable instances
    $variableList = array();
    $variableClass = 'com\zoho\crm\api\variables\Variable';
    //Get instance of Variable Class
    $variable1 = new $variableClass();
    $variable1->setId("34770617444005");
    $variable1->setValue("4763");
    $variable1->setAPIName("er");
    array_push($variableList, $variable1);
    $variable1 = new $variableClass();
    $variable1->setId("34770617444010");
    $variable1->setAPIName("eer");
    $variable1->setDescription("This is a new description");
    array_push($variableList, $variable1);
    $variable1 = new $variableClass();
    $variable1->setId("3477061444012");
    $variable1->setAPIName("re");
    array_push($variableList, $variable1);
    $request->setVariables($variableList);
    //Call updateVariables method that takes BodyWrapper class instance as parameter
    $response = $variablesOperations->updateVariables($request);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/variables-samples.html?src=update_variables)

### Get a Variable

- v2.x.x

    ```php
    $variable_ins=ZCRMVariable::getInstance();//to get the rest client
    ZCRMVariable::getDescription();
    $variable_ins->setId("35240333124006");
    $group_id = "35240330231001";
    $variable_instance = $variable_ins->getVariable($group_id);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/variable-samples.html?src=get_variable)

- v3.x.x

    ```php
    //Get instance of VariablesOperations Class
    $variablesOperations = new VariablesOperations();
    //Get instance of ParameterMap Class
    $paramInstance = new ParameterMap();
    $paramInstance->add(GetVariableByIDParam::group(), "34770613089001");//"General"
    //Call getVariableByGroupId method that takes paramInstance and variableId as parameter
    $response = $variablesOperations->getVariableById($variableId,$paramInstance);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/variables-samples.html?src=get_by_id)

### Update a Variable

- v2.x.x

    ```php
    $variable_ins=ZCRMVariable::getInstance();//to get the rest client
    $variable_ins->setId("3524039002");
    $variable_ins->setValue("3");
    $variable_ins->setDescription("automated sdk");
    $responseIn=$variable_ins->updateVariable();
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/variable-samples.html?src=update_variable)

- v3.x.x

    ```php
    //Get instance of VariablesOperations Class
    $variablesOperations = new VariablesOperations();
    //Get instance of BodyWrapper Class that will contain the request body
    $request = new BodyWrapper();
    //List of Variable instances
    $variableList = array();
    $variableClass = 'com\zoho\crm\api\variables\Variable';
    //Get instance of Variable Class
    $variable1 = new $variableClass();
    $variable1->setAPIName("TestAPIName");
    array_push($variableList, $variable1);
    $request->setVariables($variableList);
    //Call updateVariableById method that takes BodyWrapper instance and variableId as parameter
    $response = $variablesOperations->updateVariableById($variableId,$request);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/variables-samples.html?src=update_by_id)

### Delete a Variable

- v2.x.x

    ```php
    $variable_ins=ZCRMVariable::getInstance();//to get the rest client
    $variable_ins->setId("35240332999002");
    $variable_ins->setValue("3");
    $variable_ins->setDescription("automated sdk");
    $responseIn=$variable_ins->deleteVariable();
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/variable-samples.html?src=delete_variable)

- v3.x.x

    ```php
    //Get instance of VariablesOperations Class
    $variablesOperations = new VariablesOperations();
    //Call deleteVariable method that takes variableId as parameter
    $response = $variablesOperations->deleteVariable($variableId);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/variables-samples.html?src=delete_variable)

## VariableGroups

### Get Variable Groups

- v2.x.x

    ```php
    $org_ins = ZCRMOrganization::getInstance();//to get the rest client
    $variable_group_instances = $org_ins->getVariableGroups();
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/organization-sample.html?src=get_variable_groups)

- v3.x.x

    ```php
    //Get instance of VariableGroupsOperations Class
    $variableGroupsOperations = new VariableGroupsOperations();
    //Call getVariableGroups method
    $response = $variableGroupsOperations->getVariableGroups();
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/variable-groups-samples.html?src=get_var_groups)

### Get a Variable Group

- v2.x.x

    ```php
    $variable_group_ins=ZCRMVariableGroup::getInstance();//to get the rest client
    $variable_group_ins->setId("3524033000000231001");
    $variable_group_instance = $variable_group_ins->getVariableGroup();
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/variable-samples.html?src=get_variable_group)

- v3.x.x

    ```php
    //Get instance of VariableGroupsOperations Class
    $variableGroupsOperations = new VariableGroupsOperations();
    //Call getVariableGroupById method that takes variableGroupId as parameter
    $response = $variableGroupsOperations->getVariableGroupById($variableGroupId);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/variable-groups-samples.html?src=get_by_id)

## Fields

### Get All Fields

- v2.x.x

    ```php
    $moduleIns = ZCRMRestClient::getInstance()->getModuleInstance("{module_api_name}"); // To get module instance
    $response = $moduleIns->getAllFields(); // to get the field
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/module-sample.html?src=all_fields)

- v3.x.x

    ```php
    //Get instance of FieldsOperations Class that takes moduleAPIName as parameter
    $fieldOperations = new FieldsOperations($moduleAPIName);
    //Get instance of ParameterMap Class
    $paramInstance = new ParameterMap();
    // $paramInstance->add(GetFieldsParam::type(), "Unused");
    //Call getFields method that takes paramInstance as parameter
    $response = $fieldOperations->getFields($paramInstance);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/fields-samples.html?src=get_fields)

### Get Field Details

- v2.x.x

    ```php
    $moduleIns = ZCRMRestClient::getInstance()->getModuleInstance("{module_api_name"); // To get module instance
    $response = $moduleIns->getFieldDetails("{field_id}"); // to get the field
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/module-sample.html?src=field_details)

- v3.x.x

    ```php
    //Get instance of FieldsOperations Class that takes moduleAPIName as parameter
    $fieldOperations = new FieldsOperations($moduleAPIName);
    //Call getField method which takes fieldId as parameter
    $response = $fieldOperations->getField($fieldId);
    ```

[sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/fields-samples.html?src=get_a_field)

## Layouts

### Get All Layouts

- v2.x.x

    ```php
    $moduleIns = ZCRMRestClient::getInstance()->getModuleInstance("{module_api_name}"); // To get module instance
    $response = $moduleIns->getAllLayouts(); // to get all the layout
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/module-sample.html?src=all_layouts)

- v3.x.x

    ```php
    //Get instance of LayoutsOperations Class that takes moduleAPIName as parameter
    $layoutsOperations = new LayoutsOperations($moduleAPIName);
    //Call getLayouts method
    $response = $layoutsOperations->getLayouts();
        ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/layouts-samples.html?src=get_layouts)

### Get Layout Details

- v2.x.x

    ```php
    $moduleIns = ZCRMRestClient::getInstance()->getModuleInstance("{module_api_name}"); // To get module instance
    $response = $moduleIns->getLayoutDetails("35240331055"); // to get the layout
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/module-sample.html?src=layout_details)

- v3.x.x

    ```php
    //Get instance of LayoutsOperations Class that takes moduleAPIName as parameter
    $layoutsOperations = new LayoutsOperations($moduleAPIName);
    //Call getLayouts method
    $response = $layoutsOperations->getLayout($layoutId);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/layouts-samples.html?src=get_a_layout)

## CustomViews

### Get All CustomViews

- v2.x.x

    ```php
    $moduleIns = ZCRMRestClient::getInstance()->getModuleInstance("{module_api_name}"); // To get module instance
    /* For VERSION <=2.0.6
    $response = $moduleIns->getAllCustomViews(); // to get all the custom views*/
    $param_map = array("page"=>"5","per_page"=>"10");//parameters to be passed
    $response = $moduleIns->getAllCustomViews($param_map); // to get all the custom views /$param_map - optional
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/module-sample.html?src=all_custom_views)

- v3.x.x

    ```php
    //Get instance of CustomViewOperations Class that takes moduleAPIName as parameter
    $customViewsOperations = new CustomViewsOperations($moduleAPIName);
    //Call getCustomViews method
    $response = $customViewsOperations->getCustomViews();
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/custom-view-samples.html?src=get_cust_views)

### Get Custom View Details

- v2.x.x

    ```php
    $moduleIns = ZCRMRestClient::getInstance()->getModuleInstance("{module_api_name}"); // To get module instance
    $response = $moduleIns->getCustomView("{custom_view_id}"); // to get the custom view
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/module-sample.html?src=custom_view_details)

- v3.x.x

    ```php
    //Get instance of CustomViewOperations Class that takes moduleAPIName as parameter
    $customViewsOperations = new CustomViewsOperations($moduleAPIName);
    //Call getCustomView method that takes customViewId as parameter
    $response = $customViewsOperations->getCustomView($customViewId);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/custom-view-samples.html?src=get_a_cust_view)

## RelatedLists

### Get All Related Lists

- v2.x.x

    ```php
    $moduleIns = ZCRMRestClient::getInstance()->getModuleInstance("{module_api_name}"); // To get module instance
    $response = $moduleIns->getAllRelatedLists(); // to get all the related lists
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/module-sample.html?src=all_related_lists)

- v3.x.x

    ```php
    //Get instance of RelatedListsOperations Class that takes moduleAPIName as parameter
    $relatedListsOperations = new RelatedListsOperations($moduleAPIName);
    //Call getRelatedLists method
    $response = $relatedListsOperations->getRelatedLists();
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/rel-list-samples.html?src=get_rel_lists)

### Get Related List Details

- v2.x.x

    ```php
    $moduleIns = ZCRMRestClient::getInstance()->getModuleInstance("{module_api_name}"); // To get module instance
    $response = $moduleIns->getRelatedListDetails("{related_list_id}"); // to get the related list
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/module-sample.html?src=related_list_details)

    - v3.x.x

        ```php
        //Get instance of RelatedListsOperations Class that takes moduleAPIName as parameter
        $relatedListsOperations = new RelatedListsOperations($moduleAPIName);
        //Call getRelatedLists method which takes relatedListId as parameter
        $response = $relatedListsOperations->getRelatedList($relatedListId);
        ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/rel-list-samples.html?src=get_a_rel_list)

## Records

### Get List of Records

- v2.x.x

    ```php
    $moduleIns = ZCRMRestClient::getInstance()->getModuleInstance("{module_api_name}"); // To get module instance
    /* For VERSION <=2.0.6 $response = $moduleIns->getRecords(null, null, null, 1, 100, null); // to get the records(parameter - custom_view_id,field_api_name,sort_order,customHeaders is optional and can be given null if not required), customheader is a keyvalue pair for eg("if-modified-since"=>"2008-09-15T15:53:00")*/
    $param_map=array("page"=>10,"per_page"=>10); // key-value pair containing all the parameters - optional
    $header_map = array("if-modified-since"=>"2019-11-15T15:26:49+05:30"); // key-value pair containing all the headers - optional
    $response = $moduleIns->getRecords($param_map,$header_map); // to get the records($param_map - parameter map,$header_map - header map
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/module-sample.html?src=records_list)

- v3.x.x

    ```php
    //Get instance of RecordOperations Class that takes moduleAPIName as parameter
    $recordOperations = new RecordOperations();
    $paramInstance = new ParameterMap();
    // $paramInstance->add(GetRecordsParam::approved(), "true");
    // $paramInstance->add(GetRecordsParam::converted(), "1234");
    // $paramInstance->add(GetRecordsParam::cvid(), "347706189005");
    // $ids = array("34770615623115", "34770614352001");
    // foreach($ids as $id)
    // {
    // 	$paramInstance->add(GetRecordsParam::ids(), $id);
    // }
    // $paramInstance->add(GetRecordsParam::uid(), "34770615181008");
    // $fieldNames = array("Last_Name", "City");
    // foreach($fieldNames as $fieldName)
    // {
        $paramInstance->add(GetRecordsParam::fields(), "id");
    // }
    // $paramInstance->add(GetRecordsParam::sortBy(), "Email");
    // $paramInstance->add(GetRecordsParam::sortOrder(), "desc");
    $paramInstance->add(GetRecordsParam::page(), 1);
    $paramInstance->add(GetRecordsParam::perPage(), 3);
    $startdatetime = date_create("2020-06-27T15:10:00+05:30")->setTimezone(new \DateTimeZone(date_default_timezone_get()));
    // $paramInstance->add(GetRecordsParam::startDateTime(), $startdatetime);
    // $enddatetime = date_create("2020-06-29T15:10:00+05:30")->setTimezone(new \DateTimeZone(date_default_timezone_get()));
    // $paramInstance->add(GetRecordsParam::endDateTime(), $enddatetime);
    // $paramInstance->add(GetRecordsParam::territoryId(), "34770613051357");
    // $paramInstance->add(GetRecordsParam::includeChild(), true);
    $headerInstance = new HeaderMap();
    // $datetime = date_create("2021-02-26T15:28:34+05:30")->setTimezone(new \DateTimeZone(date_default_timezone_get()));
    // $headerInstance->add(GetRecordsHeader::IfModifiedSince(), $datetime);
    //Call getRecords method
    $response = $recordOperations->getRecords($moduleAPIName,$paramInstance, $headerInstance);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/record-samples.html?src=get_records)

### Get a Record

- v2.x.x

    ```php
    $moduleIns = ZCRMRestClient::getInstance()->getModuleInstance("{module_api_name}"); // To get module instance
    $param_map = array("fields"=>"Company,Last_Name"); // key-value pair containing all the params - optional
    $header_map = array("header_name"=>"header_value"); // key-value pair containing all the headers - optional
    $response = $moduleIns->getRecord("{record_id}",$param_map,$header_map); // To get module record
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/module-sample.html?src=get_record)

- v3.x.x

    ```php
    //Get instance of RecordOperations Class
    $recordOperations = new RecordOperations();
    //Get instance of ParameterMap Class
    $paramInstance = new ParameterMap();
    // $paramInstance->add(GetRecordParam::approved(), "false");
    // $paramInstance->add(GetRecordParam::converted(), "false");
    // $fieldNames = array("Deal_Name", "Company");
    // foreach($fieldNames as $fieldName)
    // {
    // $paramInstance->add(GetRecordParam::fields(), $fieldName);
    // }
    // $startdatetime = date_create("2020-06-27T15:10:00");
    // $paramInstance->add(GetRecordParam::startDateTime(), $startdatetime);
    // $enddatetime = date_create("2020-06-29T15:10:00");
    // $paramInstance->add(GetRecordParam::endDateTime(), $enddatetime);
    // $paramInstance->add(GetRecordParam::territoryId(), "34770613051357");
    // $paramInstance->add(GetRecordParam::includeChild(), true);
    $headerInstance = new HeaderMap();
    // $ifmodifiedsince = date_create("2020-06-02T11:03:06+05:30")->setTimezone(new \DateTimeZone(date_default_timezone_get()));
    // $headerInstance->add(GetRecordHeader::IfModifiedSince(), $ifmodifiedsince);
    //Call getRecord method that takes paramInstance, moduleAPIName and recordID as parameter
    $response = $recordOperations->getRecord( $recordId,$moduleAPIName,$paramInstance, $headerInstance);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/record-samples.html?src=get_record)

### Search Records

- v2.x.x

  - Search Records by Word

    ```php
    $moduleIns = ZCRMRestClient::getInstance()->getModuleInstance("{module_api_name}"); // To get module instance
    /* For VERSION <=2.0.6  $searchWord="word_to_search_for";//word to search for
    $page=1;//page number
    $perPage=200;//records per page
    $response = $moduleIns->searchRecords($searchWord, $page , $perPage ); // To get module records// $searchWord word to be searched// $page to get the list of records from the respective pages. Default value for page is 1.// $perPage To get the list of records available per page. Default value for per page is 200.*/
    $searchWord = "automated";//word to search for
    $param_map = array("page"=>1,"per_page"=>1); // key-value pair containing all the parameters
    $response = $moduleIns->searchRecordsByWord($searchWord,$param_map) ;// To get module records// $searchWord word to be searched// $param_map-parameters key-value pair - optional
    $records = $response->getData(); // To get response data
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/module-sample.html?src=search_record)

  - Search Records by Phone

    ```php
    $moduleIns = ZCRMRestClient::getInstance()->getModuleInstance("{module_api_name}"); // To get module instance
    $phone = 313213;//phone number to search for
    /*For VERSION searchRecordsByPhone($phone, $page, $perPage); // To get module records// $searchWord word to be searched// $page to get the list of records from the respective pages. Default value for page is 1.// $perPage To get the list of records available per page. Default value for per page is 200.*/
    $param_map = array("page"=>1,"per_page"=>1); // key-value pair containing all the parameters
    $response = $moduleIns->searchRecordsByPhone($phone,$param_map) ;// To get module records// $phone phone to be searched// $param_map-parameters key-value pair - optional
    $records = $response->getData(); // To get response data
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/module-sample.html?src=search_record_phone)

  - Search Records by Email

    ```php
    $moduleIns = ZCRMRestClient::getInstance()->getModuleInstance("{module_api_name}"); // To get module instance
    /* For VERSION <=2.0.6 $email="{email_id}";//email id  to search for
    $page=1;//page number
    $perPage=200;//records per page
    $response = $moduleIns->searchRecordsByEmail($email, $page, $perPage); // To get module records//$searchWord word to be searched//$page to get the list of records from the respective pages. Default value for page is 1.//$perPage To get the list of records available per page. Default value for per page is 200.*/
    $email = "email_id";//email id  to search for
    $param_map=array("page"=>1,"per_page"=>1); // key-value pair containing all the parameters
    $response = $moduleIns->searchRecordsByEmail($email,$param_map) ;// To get module records// $email email id  to search for// $param_map-parameters key-value pair - optional
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/module-sample.html?src=search_record_email)

  - Search Records by Criteria

    ```php
    $moduleIns = ZCRMRestClient::getInstance()->getModuleInstance("{module_api_name}"); // To get module instance
    $criteria = "criteria";//criteria to search for
    /* For VERSION <=2.0.6  $page=5;//page number
    $perPage=200;//records per page
    $response = $moduleIns->searchRecordsByCriteria($criteria, $page, $perPage); // To get module records//string $searchWord word to be searched//number $page to get the list of records from the respective pages. Default value for page is 1.//number $perPage To get the list of records available per page. Default value for per page is 200.*/
        $param_map=array("page"=>1,"per_page"=>1); // key-value pair containing all the parameters
    $response = $moduleIns->searchRecordsByCriteria($criteria,$param_map) ;// To get module records// $criteria to search for  to search for// $param_map-parameters key-value pair - optional
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/module-sample.html?src=search_record_criteria)

- v3.x.x

    ```php
    //example, moduleAPIName = "Leads";
    //Get instance of RecordOperations Class that takes moduleAPIName as parameter
    $recordOperations = new RecordOperations();
    $paramInstance = new ParameterMap();
    $paramInstance->add(SearchRecordsParam::criteria(), "((Last_Name:starts_with:Last Name) or (Company:starts_with:fasf\\(123\\) K))");
    $paramInstance->add(SearchRecordsParam::email(), "abc@gmail.com");
    $paramInstance->add(SearchRecordsParam::phone(), "234567890");
    $paramInstance->add(SearchRecordsParam::word(), "First Name Last Name");
    $paramInstance->add(SearchRecordsParam::converted(), "both");
    $paramInstance->add(SearchRecordsParam::approved(), "both");
    $paramInstance->add(SearchRecordsParam::page(), 1);
    $paramInstance->add(SearchRecordsParam::perPage(), 2);
    //Call getRecords method
    $response = $recordOperations->searchRecords($moduleAPIName,$paramInstance);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/record-samples.html?src=search_records)

### Update Records

- v2.x.x

    ```php
    $moduleIns = ZCRMRestClient::getInstance()->getModuleInstance("{module_api_name}"); // to get the instance of the module
    $inventoryRecords = array();
    /**
        * Following methods are being used only by same Inventory only  *
        */
    $record = ZCRMRecord::getInstance("{module_api_name}", "{record_id}"); // to get the instance of the record
    $record->setFieldValue("Subject", "Invoice3"); // This function use to set FieldApiName and value similar to all other FieldApis and Custom field
    $record->setFieldValue("Account_Name", "{account_id}");
    $lineItem = ZCRMInventoryLineItem::getInstance("{line_item_id}"); // To get ZCRMInventoryLineItem instance
    $lineItem->setDescription("Product_description"); // To set line item description
    $lineItem->setDiscount(20); // To set line item discount
    $lineItem->setListPrice(3412); // To set line item list price

    $taxInstance1 = ZCRMTax::getInstance("{tax_name}"); // to get the tax instance
    $taxInstance1->setPercentage(20); // to set the tax percentage
    $taxInstance1->setValue(50); // to set the tax value
    $lineItem->addLineTax($taxInstance1); // to add the tax to the line item

    $lineItem->setQuantity(101); // To set product quantity to this line item
    $record->addLineItem($lineItem); // to add the line item to the record of invoice

    array_push($inventoryRecords, $record); // pushing the record to the array

    $record2 = ZCRMRecord::getInstance("{module_api_name}", "{record_id}"); // to get the instance of the record
    $record2->setFieldValue("Subject", "Invoice3"); // This function use to set FieldApiName and value similar to all other FieldApis and Custom field
    $record2->setFieldValue("Account_Name", "{account_id}");
    $lineItem = ZCRMInventoryLineItem::getInstance("{line_item_id}"); // To get ZCRMInventoryLineItem instance
    $lineItem->setDescription("Product_description"); // To set line item description
    $lineItem->setDiscount(20); // To set line item discount
    $lineItem->setListPrice(3412); // To set line item list price

    $taxInstance1 = ZCRMTax::getInstance("{tax_name}"); // to get the tax instance
    $taxInstance1->setPercentage(20); // to set the tax percentage
    $taxInstance1->setValue(50); // to set the tax value
    $lineItem->addLineTax($taxInstance1); // to add the tax to the line item

    $lineItem->setQuantity(101); // To set product quantity to this line item
    $record2->addLineItem($lineItem); // to add the line item to the record of invoice

    array_push($inventoryRecords, $record2); // pushing the record to the array

    /**
        * for Price books module only
        */
    $pricebookRecords = array();

    $record = ZCRMRecord::getInstance("Price_Books", "price_book_id"); // to get the price book record
    $record->setFieldValue("Pricing_Details", json_decode('[ { "to_range": 5, "discount": 0, "from_range": 1 }, { "to_range": 11, "discount": 1, "from_range": 6 }, { "to_range": 17, "discount": 2, "from_range": 12 }, { "to_range": 23, "discount": 3, "from_range": 18 }, { "to_range": 29, "discount": 4, "from_range": 24 } ]', true)); // setting the discount , range of the pricebook record
    $record->setFieldValue("Pricing_Model", "Flat"); // setting the price book model
    array_push($pricebookRecords, $record); // pushing the record to the array


    $trigger=array();//triggers to include
    $responseIn = $moduleIns->updateRecords($inventoryRecords,$trigger); // updating the records.$trigger is optional , to update price book records$pricebookRecords can be used in the place of $inventoryRecords

    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/module-sample.html?src=update_records)

- v3.x.x

    ```php
    //Get instance of RecordOperations Class
    $recordOperations = new RecordOperations();
    //Get instance of BodyWrapper Class that will contain the request body
    $request = new BodyWrapper();
    //List of Record instances
    $records = array();
    $recordClass = 'com\zoho\crm\api\record\Record';
    //Get instance of Record Class
    $record1 = new $recordClass();
    $record1->setId("34770616606002");
    /*
        * Call addFieldValue method that takes two arguments
        * 1 -> Call Field "." and choose the module from the displayed list and press "." and choose the field name from the displayed list.
        * 2 -> Value
        */
    $field = new Field("");
    $record1->addFieldValue(Leads::City(), "City");
    $record1->addFieldValue(Leads::LastName(), "Last Name");
    $record1->addFieldValue(Leads::FirstName(), "First Name");
    $record1->addFieldValue(Leads::Company(), "KKRNP");
    /*
        * Call addKeyValue method that takes two arguments
        * 1 -> A string that is the Field's API Name
        * 2 -> Value
        */
    $record1->addKeyValue("Custom_field", "Value");
    $record1->addKeyValue("Custom_field_2", "value");
    //Add Record instance to the list
    // array_push($records, $record1);
    //Get instance of Record Class
    $record2 = new $recordClass();
    $record2->setId("34770616603294");
    /*
        * Call addFieldValue method that takes two arguments
        * 1 -> Call Field "." and choose the module from the displayed list and press "." and choose the field name from the displayed list.
        * 2 -> Value
        */
    $record2->addFieldValue(Leads::City(), "City");
    $record2->addFieldValue(Leads::LastName(), "Last Name");
    $record2->addFieldValue(Leads::FirstName(), "First Name");
    $record2->addFieldValue(Leads::Company(), "KKRNP");
    /*
        * Call addKeyValue method that takes two arguments
        * 1 -> A string that is the Field's API Name
        * 2 -> Value
        */
    $record2->addKeyValue("Custom_field", "Value");
    $record2->addKeyValue("Custom_field_2", "value");
    //Add Record instance to the list
    // array_push($records, $record2);
    //Set the list to Records in BodyWrapper instance
    $request->setData($records);
    $trigger = array("approval", "workflow", "blueprint");
    $request->setTrigger($trigger);
    //Call createRecords method that takes BodyWrapper instance and moduleAPIName as parameter.
    $response = $recordOperations->updateRecords($moduleAPIName, $request);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/record-samples.html?src=update_records)

### Create Records

- v2.x.x

    ```php
    $moduleIns=ZCRMRestClient::getInstance()->getModuleInstance("{module_api_name}"); //to get the instance of the module
    $records=array();
    $record=ZCRMRecord::getInstance("{module_api_name}",null);  //To get ZCRMRecord instance
    $record->setFieldValue("Subject","Invoice"); //This function use to set FieldApiName and value similar to all other FieldApis and Custom field
    $record->setFieldValue("Account_Name","{account_id}"); //This function is for Invoices module
    /** Following methods are being used only by Inventory modules **/

    $lineItem=ZCRMInventoryLineItem::getInstance(null);  //To get ZCRMInventoryLineItem instance
    $lineItem->setDescription("Product_description");  //To set line item description
    $lineItem ->setDiscount(5);  //To set line item discount
    $lineItem->setListPrice(100);  //To set line item list price

    $taxInstance1=ZCRMTax::getInstance("{tax_name}");  //To get ZCRMTax instance
    $taxInstance1->setPercentage(2);  //To set tax percentage
    $taxInstance1->setValue(50);  //To set tax value
    $lineItem->addLineTax($taxInstance1);  //To set line tax to line item

    $taxInstance1=ZCRMTax::getInstance("{tax_name}"); //to get the tax instance
    $taxInstance1->setPercentage(12); //to set the tax percentage
    $taxInstance1->setValue(50); //to set the tax value
    $lineItem->addLineTax($taxInstance1); //to add the tax to line item

    $lineItem->setProduct(ZCRMRecord::getInstance("{module_api_name}","{record_id}"));  //To set product to line item
    $lineItem->setQuantity(100);  //To set product quantity to this line item

    $record->addLineItem($lineItem);   //to add the line item to the record


    array_push($records, $record); // pushing the record to the array.
    $trigger = array();//triggers to include
    $lar_id = {"lead_assignment_rule_id"};//lead assignment rule id
    $responseIn = $moduleIns->createRecords($records, $trigger,$lar_id); // updating the records.$trigger,$lar_id are optional
    ```

[sample code](https://www.zoho.com/crm/developer/docs/php-sdk/module-sample.html?src=create_records)

- v3.x.x

    ```php
    //Get instance of RecordOperations Class that takes moduleAPIName as parameter
    $recordOperations = new RecordOperations();
    //Get instance of BodyWrapper Class that will contain the request body
    $bodyWrapper = new BodyWrapper();
    //List of Record instances
    $records = array();
    $recordClass = 'com\zoho\crm\api\record\Record';
    //Get instance of Record Class
    $record1 = new $recordClass();
    /*
        * Call addFieldValue method that takes two arguments
        * 1 -> Call Field "." and choose the module from the displayed list and press "." and choose the field name from the displayed list.
        * 2 -> Value
        */
    $field = new Field("");
    // $record1->addFieldValue(Leads::City(), "City");
    $record1->addFieldValue(Leads::LastName(), "FROm PHP");
    // $record1->addFieldValue(Leads::FirstName(), "First Name");
    // $record1->addFieldValue(Leads::Company(), "KKRNP");
    // $record1->addFieldValue(Vendors::VendorName(), "Vendor Name");
    // $record1->addFieldValue(Deals::Stage(), new Choice("Clo"));
    // $record1->addFieldValue(Deals::DealName(), "deal_name");
    // $record1->addFieldValue(Deals::Description(), "deals description");
    // $record1->addFieldValue(Deals::ClosingDate(), new \DateTime("2021-06-02"));
    // $record1->addFieldValue(Deals::Amount(), 50.7);
    // $record1->addFieldValue(Campaigns::CampaignName(), "Campaign_Name");
    // $record1->addFieldValue(Solutions::SolutionTitle(), "Solution_Title");
    $record1->addFieldValue(Accounts::AccountName(), "Account_Name");
    // $record1->addFieldValue(Cases::CaseOrigin(), new Choice("AutomatedSDK"));
    // $record1->addFieldValue(Cases::Status(), new Choice("AutomatedSDK"));
    /*
        * Call addKeyValue method that takes two arguments
        * 1 -> A string that is the Field's API Name
        * 2 -> Value
        */
    // $record1->addKeyValue("Custom_field", "Value");
    // $record1->addKeyValue("Custom_field_2", "value");
    $record1->addKeyValue("Date_1", new \DateTime('2021-03-08'));
    $record1->addKeyValue("Date_Time_2", date_create("2020-06-02T11:03:06+05:30")->setTimezone(new \DateTimeZone(date_default_timezone_get())));
    // $record1->addKeyValue("Subject", "From PHP");
    // $taxName = array(new Choice("Vat"), new Choice("Sales Tax"));
    // $record1->addKeyValue("Tax", $taxName);
    // $record1->addKeyValue("Product_Name", "AutomatedSDK");
    // $fileDetails = array();
    // $fileDetail1 = new FileDetails();
    // $fileDetail1->setFileId("ae9c7cefa30f3c0dee629");
    // array_push($fileDetails, $fileDetail1);
    // $fileDetail2 = new FileDetails();
    // $fileDetail2->setFileId("ae9c7cefa418aec1d92ec8454d7");
    // array_push($fileDetails, $fileDetail2);
    // $fileDetail3 = new FileDetails();
    // $fileDetail3->setFileId("ae9c7cefa418aec1d6aee6eb");
    // array_push($fileDetails, $fileDetail3);
    // $record1->addKeyValue("File_Upload", $fileDetails);
    // /** Following methods are being used only by Inventory modules */
    // $vendorName = new $recordClass();
    // $record1->addFieldValue(Vendors::id(), "34770617247001");
    // $record1->addFieldValue(Purchase_Orders::VendorName(), $vendorName);
    // $dealName = new $recordClass();
    // $dealName->addFieldValue(Deals::id(), "34770614995070");
    // $record1->addFieldValue(Sales_Orders::DealName(), $dealName);
    // $contactName = new $recordClass();
    // $contactName->addFieldValue(Contacts::id(), "34770614977055");
    // $record1->addFieldValue(Purchase_Orders::ContactName(), $contactName);
    // $accountName = new $recordClass();
    // $accountName->addKeyValue("name", "automatedAccount");
    // $record1->addFieldValue(Quotes::AccountName(), $accountName);
    // $record1->addKeyValue("Discount", 10.5);
    // $inventoryLineItemList = array();
    // $inventoryLineItem = new InventoryLineItems();
    // $lineItemProduct = new LineItemProduct();
    // $lineItemProduct->setId("34770615356009");
    // $inventoryLineItem->setProduct($lineItemProduct);
    // $inventoryLineItem->setQuantity(1.5);
    // $inventoryLineItem->setProductDescription("productDescription");
    // $inventoryLineItem->setListPrice(10.0);
    // $inventoryLineItem->setDiscount("5.0");
    // $inventoryLineItem->setDiscount("5.25%");
    // $productLineTaxes = array();
    // $productLineTax = new LineTax();
    // $productLineTax->setName("Sales Tax");
    // $productLineTax->setPercentage(20.0);
    // array_push($productLineTaxes, $productLineTax);
    // $inventoryLineItem->setLineTax($productLineTaxes);
    // array_push($inventoryLineItemList, $inventoryLineItem);
    // $record1->addKeyValue("Product_Details", $inventoryLineItemList);
    // $lineTaxes = array();
    // $lineTax = new LineTax();
    // $lineTax->setName("Sales Tax");
    // $lineTax->setPercentage(20.0);
    // array_push($lineTaxes,$lineTax);
    // $record1->addKeyValue('$line_tax', $lineTaxes);
        /** End Inventory **/
    /** Following methods are being used only by Activity modules */
    // Tasks,Calls,Events
    // $record1->addFieldValue(Tasks::Description(), "Test Task");
    // $record1->addKeyValue("Currency",new Choice("INR"));
    // $remindAt = new RemindAt();
    // $remindAt->setAlarm("FREQ=NONE;ACTION=EMAILANDPOPUP;TRIGGER=DATE-TIME:2020-07-03T12:30:00.05:30");
    // $record1->addFieldValue(Tasks::RemindAt(), $remindAt);
    // $whoId = new $recordClass();
    // $whoId->setId("34770614977055");
    // $record1->addFieldValue(Tasks::WhoId(), $whoId);
    // $record1->addFieldValue(Tasks::Status(),new Choice("Waiting for input"));
    // $record1->addFieldValue(Tasks::DueDate(), new \DateTime('2021-03-08'));
    // $record1->addFieldValue(Tasks::Priority(),new Choice("High"));
    // $record1->addKeyValue('$se_module', "Accounts");
    // $whatId = new $recordClass();
    // $whatId->setId("3477061207118");
    // $record1->addFieldValue(Tasks::WhatId(), $whatId);
    /** Recurring Activity can be provided in any activity module*/
    // $recurringActivity = new RecurringActivity();
    // $recurringActivity->setRrule("FREQ=DAILY;INTERVAL=10;UNTIL=2020-08-14;DTSTART=2020-07-03");
    // $record1->addFieldValue(Events::RecurringActivity(), $recurringActivity);
    // Events
    // $record1->addFieldValue(Events::Description(), "Test Events");
    $startdatetime = date_create("2020-06-02T11:03:06+05:30")->setTimezone(new \DateTimeZone(date_default_timezone_get()));
    $record1->addFieldValue(Events::StartDateTime(), $startdatetime);
    // $participants = array();
    // $participant1 = new Participants();
    // $participant1->setParticipant("abc@gmail.com");
    // $participant1->setType("email");
    // $participant1->setId("34770615902017");
    // array_push($participants, $participant1);
    // $participant2 = new Participants();
    // $participant2->addKeyValue("participant", "34770615844006");
    // $participant2->addKeyValue("type", "lead");
    // array_push($participants, $participant2);
    // $record1->addFieldValue(Events::Participants(), $participants);
    // $record1->addKeyValue('$send_notification', true);
    $record1->addFieldValue(Events::EventTitle(), "From PHP");
    $enddatetime = date_create("2020-07-02T11:03:06+05:30")->setTimezone(new \DateTimeZone(date_default_timezone_get()));
    $record1->addFieldValue(Events::EndDateTime(), $enddatetime);
    // $remindAt = date_create("2020-06-02T11:03:06+05:30")->setTimezone(new \DateTimeZone(date_default_timezone_get()));
    // $record1->addFieldValue(Events::RemindAt(), $remindAt);
    // $record1->addFieldValue(Events::CheckInStatus(), "PLANNED");
    // $remindAt = new RemindAt();
    // $remindAt->setAlarm("FREQ=NONE;ACTION=EMAILANDPOPUP;TRIGGER=DATE-TIME:2020-07-23T12:30:00+05:30");
    // $record1->addFieldValue(Tasks::RemindAt(), $remindAt);
    // $record1->addKeyValue('$se_module', "Leads");
    // $whatId = new $recordClass();
    // $whatId->setId("34770614381002");
    // $record1->addFieldValue(Events::WhatId(), $whatId);
    // $record1->addFieldValue(Tasks::WhatId(), $whatId);
    // $record1->addFieldValue(Calls::CallType(), new Choice("Outbound"));
    // $record1->addFieldValue(Calls::CallStartTime(), date_create("2020-07-02T11:03:06+05:30")->setTimezone(new \DateTimeZone(date_default_timezone_get())));
    /** End Activity **/
    /** Following methods are being used only by Price_Books modules */
    // $pricingDetails = array();
    // $pricingDetail1 = new PricingDetails();
    // $pricingDetail1->setFromRange(1.0);
    // $pricingDetail1->setToRange(5.0);
    // $pricingDetail1->setDiscount(2.0);
    // array_push($pricingDetails, $pricingDetail1);
    // $pricingDetail2 = new PricingDetails();
    // $pricingDetail2->addKeyValue("from_range", 6.0);
    // $pricingDetail2->addKeyValue("to_range", 11.0);
    // $pricingDetail2->addKeyValue("discount", 3.0);
    // array_push($pricingDetails, $pricingDetail2);
    // $record1->addFieldValue(Price_Books::PricingDetails(), $pricingDetails);
    // $record1->addKeyValue("Email", "abc.k123@zoho.com");
    // $record1->addFieldValue(Price_Books::Description(), "TEST");
    // $record1->addFieldValue(Price_Books::PriceBookName(), "book_name");
    // $record1->addFieldValue(Price_Books::PricingModel(), new Choice("Flat"));
    $tagList = array();
    $tag = new Tag();
    $tag->setName("Testtask");
    array_push($tagList, $tag);
    //Set the list to Tags in Record instance
    $record1->setTag($tagList);
    //Add Record instance to the list
    // array_push($records, $record1);
    //Set the list to Records in BodyWrapper instance
    $bodyWrapper->setData($records);
    $trigger = array("approval", "workflow", "blueprint");
    $bodyWrapper->setTrigger($trigger);
    //bodyWrapper.setLarId("347706187515");
    //Call createRecords method that takes BodyWrapper instance as parameter.
    $response = $recordOperations->createRecords($moduleAPIName,$bodyWrapper);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/record-samples.html?src=create_records)

### Delete Records

- v2.x.x

    ```php
    $moduleIns = ZCRMRestClient::getInstance()->getModuleInstance("{module_api_name}"); // to get the instance of the module
    $recordids = array(
        "{record_id}",
        "{record_id}"
    ); // to create an array of record ids
    $responseIn = $moduleIns->deleteRecords($recordids); // to delete the recordss
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/module-sample.html?src=delete_records)

- v3.x.x

    ```php
    //API Name of the module to update record
    //$moduleAPIName = "Leads";
    //Get instance of RecordOperations Class
    $recordOperations = new RecordOperations();
    //Get instance of ParameterMap Class
    $paramInstance = new ParameterMap();
    foreach($recordIds as $id)
    {
        $paramInstance->add(DeleteRecordsParam::ids(), $id);
    }
    // $paramInstance->add(DeleteRecordsParam::wfTrigger(), "true");
    //Call deleteRecord method that takes ModuleAPIName and recordId as parameter.
    $response = $recordOperations->deleteRecords($moduleAPIName,$paramInstance);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/record-samples.html?src=delete_records)

### Get Deleted Records

- v2.x.x

  - Get List of Deleted Records

    ```php
    $moduleIns = ZCRMRestClient::getInstance()->getModuleInstance("{module_api_name}"); // to get the instance of the module
    /*For VERSION getAllDeletedRecords()->getData(); // to get the trashrecords inform of ZCRMTrashRecord array instances */
    $param_map = array("page"=>"20","per_page"=>"200"); // key-value pair containing all the parameters - optional
    $header_map = array("if-modified-since"=>"2019-11-10T15:26:49+05:30"); // key-value pair containing all the headers - optional
    $trashRecords = $moduleIns->getAllDeletedRecords($param_map,$header_map)->getData(); // to get the trashrecords inform of ZCRMTrashRecord array instances/$param_map - parameter map, $header_map - header_map
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/module-sample.html?src=deleted_records_list)

  - Get Records from Recycle Bin

    ```php
    $moduleIns = ZCRMRestClient::getInstance()->getModuleInstance("{module_api_name}"); // to get the instance of the module
    /* For VERSION <=2.0.6 $trashRecords = $moduleIns->getRecycleBinRecords()->getData(); // to get the trashrecords inform of ZCRMTrashRecord array instances*/
        $param_map = array("page"=>"20","per_page"=>"200"); // key-value pair containing all the parameters - optional
    $header_map = array("if-modified-since"=>"2019-11-10T15:26:49+05:30"); // key-value pair containing all the headers - optional
    $trashRecords = $moduleIns->getRecycleBinRecords($param_map,$header_map)->getData(); // to get the trashrecords inform of ZCRMTrashRecord array instances/$param_map - parameter map, $header_map - header_map
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/module-sample.html?src=recycle_bin_records)

  - Get List of Permanently Deleted Records

    ```php
    $moduleIns = ZCRMRestClient::getInstance()->getModuleInstance("Leads"); // to get the instance of the module
    /* For VERSION <=2.0.6 $trashRecords = $moduleIns->getPermanentlyDeletedRecords()->getData(); // to get the trashrecords inform of ZCRMTrashRecord array instances*/
        $param_map = array("page"=>"20","per_page"=>"200"); // key-value pair containing all the parameters - optional
    $header_map = array("if-modified-since"=>"2019-11-10T15:26:49+05:30"); // key-value pair containing all the headers - optional
    $trashRecords = $moduleIns->getPermanentlyDeletedRecords($param_map,$header_map)->getData(); // to get the trashrecords inform of ZCRMTrashRecord array instances/$param_map - parameter map, $header_map - header_map
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/module-sample.html?src=permanently_deleted_records)

- v3.x.x

    ```php
    //Get instance of RecordOperations Class
    $recordOperations = new RecordOperations();
    //Get instance of ParameterMap Class
    $paramInstance = new ParameterMap();
    $paramInstance->add(GetDeletedRecordsParam::type(), "recycle");//all, recycle, permanent
    // $paramInstance->add(GetDeletedRecordsParam::page(), 1);
    // $paramInstance->add(GetDeletedRecordsParam::perPage(), 2);
    //Get instance of HeaderMap Class
    $headerInstance = new HeaderMap();
    $ifModifiedSince = date_create("2020-06-02T11:03:06+05:30")->setTimezone(new \DateTimeZone(date_default_timezone_get()));
    $headerInstance->add(GetDeletedRecordsHeader::IfModifiedSince(), $ifModifiedSince);
    //Call getDeletedRecords method that takes paramInstance, headerInstance and moduleAPIName as parameter
    $response = $recordOperations->getDeletedRecords($moduleAPIName, $paramInstance, $headerInstance);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/record-samples.html?src=get_deleted_records)

### Upsert Records

- v2.x.x

    ```php
    $moduleIns = ZCRMRestClient::getInstance()->getModuleInstance("{Module_api_name"); // to get the instance of the module
    $records = array();
    /**
        * Following methods are being used only by Inventory modules *
        */
    $record = ZCRMRecord::getInstance("{record_id}", null); // to get the instance of the record
    $record->setFieldValue("Company", "Invoisdsddsdce3"); // This function use to set FieldApiName and value similar to all other FieldApis and Custom field
    $record->setFieldValue("Email", "asdsdsdasd@asd.com");
    $record->setFieldValue("Last_Name", "aaddasd");
    array_push($records, $record); // pushing the record to the array
    $duplicate_check_fields = array('Company');
    $lar_id = "{lar_id}";
    $trigger = array();//trigger to include
    $responseIn = $moduleIns->upsertRecords($records, null, $lar_id, $duplicate_check_fields); // updating the records.
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/module-sample.html?src=upsert_records)

- v3.x.x

    ```php
    //Get instance of RecordOperations Class that takes moduleAPIName as parameter
    $recordOperations = new RecordOperations();
    //Get instance of BodyWrapper Class that will contain the request body
    $request = new BodyWrapper();
    //List of Record instances
    $records = array();
    $recordClass = 'com\zoho\crm\api\record\Record';
    //Get instance of Record Class
    $record1 = new $recordClass();
    /*
        * Call addFieldValue method that takes two arguments
        * 1 -> Call Field "." and choose the module from the displayed list and press "." and choose the field name from the displayed list.
        * 2 -> Value
        */
    $field = new Field("");
    $record1->addFieldValue(Leads::City(), "City");
    // $record1->addFieldValue(Leads::LastName(), "Last Name");
    $record1->addFieldValue(Leads::FirstName(), "First Name");
    $record1->addFieldValue(Leads::Company(), "Company1");
    /*
        * Call addKeyValue method that takes two arguments
        * 1 -> A string that is the Field's API Name
        * 2 -> Value
        */
    $record1->addKeyValue("Custom_field", "Value");
    $record1->addKeyValue("Custom_field_2", "value");
    //Add Record instance to the list
    array_push($records, $record1);
    //Get instance of Record Class
    $record2 = new $recordClass();
    /*
        * Call addFieldValue method that takes two arguments
        * 1 -> Call Field "." and choose the module from the displayed list and press "." and choose the field name from the displayed list.
        * 2 -> Value
        */
    $record2->addFieldValue(Leads::City(), "City");
    // $record2->addFieldValue(Leads::LastName(), "Last Name");
    $record2->addFieldValue(Leads::FirstName(), "First Name");
    $record2->addFieldValue(Leads::Company(), "Company12");
    /*
        * Call addKeyValue method that takes two arguments
        * 1 -> A string that is the Field's API Name
        * 2 -> Value
        */
    $record2->addKeyValue("Custom_field", "Value");
    $record2->addKeyValue("Custom_field_2", "value");
    //Add Record instance to the list
    array_push($records, $record2);
    $duplicateCheckFields = array("City", "Last_Name", "First_Name");
    $request->setDuplicateCheckFields($duplicateCheckFields);
    //Set the list to Records in BodyWrapper instance
    $request->setData($records);
    //Call createRecords method that takes BodyWrapper instance as parameter.
    $response = $recordOperations->upsertRecords($moduleAPIName, $request);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/record-samples.html?src=upsert_records)

### Mass Update Records

- v2.x.x

    ```php
    $moduleIns = ZCRMRestClient::getInstance()->getModuleInstance("leads"); // to get the instance of the module
    $entityIds = array(
        "{record_id}"
    ); // array of entity ids
    $responseIn = $moduleIns->massUpdateRecords($entityIds, "{field_api_name}", "{value to update}"); // to update the field api name with corresponding field value for the entities
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/module-sample.html?src=mass_update_records)

- v3.x.x

    ```php
    //Get instance of RecordOperations Class
    $recordOperations = new RecordOperations();
    //Get instance of MassUpdateBodyWrapper Class that will contain the request body
    $request = new MassUpdateBodyWrapper();
    //List of Record instances
    $records = array();
    $recordClass = 'com\zoho\crm\api\record\Record';
    //Get instance of Record Class
    $record1 = new $recordClass();
    /*
        * Call addKeyValue method that takes two arguments
        * 1 -> A string that is the Field's API Name
        * 2 -> Value
        */
    $record1->addKeyValue("City", "Value");
    //Add Record instance to the list
    array_push($records, $record1);
    //Set the list to Records in BodyWrapper instance
    $request->setData($records);
    $request->setCvid("347706187501");
    // $ids = array("34770616603276");
    // $request->setIds($ids);
    // $territory = new Territory();
    // $territory->setId("34770613051357");
    // $territory->setIncludeChild(true);
    // $request->setTerritory($territory);
    $request->setOverWrite(true);
    //Call massUpdateRecords method that takes BodyWrapper instance, ModuleAPIName as parameter.
    $response = $recordOperations->massUpdateRecords($moduleAPIName, $request);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/record-samples.html?src=mass_update)

### Create a Record

- v2.x.x

    ```php
    $record = ZCRMRestClient::getInstance()->getRecordInstance("{module_api_name}", "{record_id}"); // To get record instance
    $record->setFieldValue("Subject", "test2312"); // This function use to set FieldApiName and value similar to all other FieldApis and Custom field
    $record->setFieldValue("Account_Name", "35240331052013"); // Account Name can be given for a new account, account_id is not mandatory in that case
    /**
        * Following methods are being used only by Inventory modules *
        */

    $lineItem = ZCRMInventoryLineItem::getInstance(null); // To get ZCRMInventoryLineItem instance
    $lineItem->setDescription("Product_description"); // To set line item description
    $lineItem->setDiscount(5); // To set line item discount
    $lineItem->setListPrice(100); // To set line item list price

    $taxInstance1 = ZCRMTax::getInstance("org"); // To get ZCRMTax instance
    $taxInstance1->setPercentage(2); // To set tax percentage
    $taxInstance1->setValue(50); // To set tax value
    $lineItem->addLineTax($taxInstance1); // To set line tax to line item

    $taxInstance1 = ZCRMTax::getInstance("org");
    $taxInstance1->setPercentage(12);
    $taxInstance1->setValue(50);
    $lineItem->addLineTax($taxInstance1);

    $lineItem->setProduct(ZCRMRecord::getInstance("Products", "{product_id}")); // To set product to line item
    $lineItem->setQuantity(100); // To set product quantity to this line item

    $record->addLineItem($lineItem);
    $trigger=array();//triggers to include
    $lar_id="{lar_id}";//lead assignment rule id
    $responseIns = $record->create($trigger,$lar_id);//$trigger , $larid optional
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/record-samples.html?src=create_record)

- v3.x.x

  - [Create a Record](#create-records)

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/record-samples.html?src=create_records)

### Update a Record

- v2.x.x

    ```php
    $record = ZCRMRestClient::getInstance()->getRecordInstance("{module_api_name}", "{record_id}"); // To get record instance
    /**
        * only for inventory module *
        */
    $record->setFieldValue("Subject", "test2312"); // This function use to set FieldApiName and value similar to all other FieldApis and Custom field
    $record->setFieldValue("Account_Name", "{account_id}"); // Account Name can be given for a new account, account_id is not mandatory in that case
    $lineItem = ZCRMInventoryLineItem::getInstance("{line_item_id}"); // To get ZCRMInventoryLineItem instance the id of the line item
    $lineItem->setDescription("Product_description"); // To set line item description
    $lineItem->setDiscount(20); // To set line item discount
    $lineItem->setListPrice(3412); // To set line item list price

    $taxInstance1 = ZCRMTax::getInstance("{tax_name}"); // to get the tax instance
    $taxInstance1->setPercentage(20); // to set the tax percentage
    $taxInstance1->setValue(50); // to set the tax value
    $lineItem->addLineTax($taxInstance1); // to add the tax to the line item
    $lineItem->setQuantity(101); // To set product quantity to this line item
    $record->addLineItem($lineItem); // to add the line item to the record of invoice
    /**
        * for price book alone
        * $record->setFieldValue("Pricing_Details", json_decode('[ { "to_range": 5, "discount": 0, "from_range": 1 }, { "to_range": 11, "discount": 1, "from_range": 6 }, { "to_range": 17, "discount": 2, "from_range": 12 }, { "to_range": 23, "discount": 3, "from_range": 18 }, { "to_range": 29, "discount": 4, "from_range": 24 } ]',true));//setting the discount , range of the pricebook record
        * $record->setFieldValue("Pricing_Model","Flat"); //setting the price book model*
        */
    $trigger=array();//triggers to include
    $lar_id="lar_id";//lead assignment rule id
    $responseIns = $record->update($trigger,$lar_id); // to update the record
    ```

    [sample code](zoho.com/crm/developer/docs/php-sdk/record-samples.html?src=update_record)

- v3.x.x

    ```php
    //Get instance of RecordOperations Class
    $recordOperations = new RecordOperations();
    //Get instance of BodyWrapper Class that will contain the request body
    $request = new BodyWrapper();
    //List of Record instances
    $records = array();
    $recordClass = 'com\zoho\crm\api\record\Record';
    //Get instance of Record Class
    $record1 = new $recordClass();
    /*
        * Call addFieldValue method that takes two arguments
        * 1 -> Call Field "." and choose the module from the displayed list and press "." and choose the field name from the displayed list.
        * 2 -> Value
        */
    $field = new Field("");
    // $record1->addFieldValue(Leads::City(), "City");
    // $record1->addFieldValue(Leads::LastName(), "Last Name");
    // $record1->addFieldValue(Leads::FirstName(), "First Name");
    // $record1->addFieldValue(Leads::Company(), "KKRNP");
    /*
        * Call addKeyValue method that takes two arguments
        * 1 -> A string that is the Field's API Name
        * 2 -> Value
        */
    // $record1->addKeyValue("Custom_field", "Value");
    // $record1->addKeyValue("Custom_field_2", "value");
    // $record1->addKeyValue("Date_1", new \DateTime('2020-03-08'));
    // $record1->addKeyValue("Date_Time_2", date_create("2021-06-02T11:03:06+05:30")->setTimezone(new \DateTimeZone(date_default_timezone_get())));
    $fileDetails = array();
    // $fileDetail1 = new FileDetails();
    // $fileDetail1->setAttachmentId("34770616072005");
    // $fileDetail1->setDelete("null");
    // array_push($fileDetails, $fileDetail1);
    $fileDetail2 = new FileDetails();
    $fileDetail2->setFileId("ae9c7cefa41863e2fd0a2d8c1c");
    array_push($fileDetails, $fileDetail2);
    $fileDetail3 = new FileDetails();
    $fileDetail3->setFileId("ae9c7cefc0f7433dd2098c");
    array_push($fileDetails, $fileDetail3);
    $record1->addKeyValue("File_Upload", $fileDetails);
    //Add Record instance to the list
    array_push($records, $record1);
    //Set the list to Records in BodyWrapper instance
    $request->setData($records);
    $trigger = array("approval", "workflow", "blueprint");
    $request->setTrigger($trigger);
    //Call updateRecord method that takes BodyWrapper instance, ModuleAPIName and recordId as parameter.
    $response = $recordOperations->updateRecord( $recordId, $moduleAPIName,$request);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/record-samples.html?src=update_record)

### Delete a Record

- v2.x.x

    ```php
    $record = ZCRMRestClient::getInstance()->getRecordInstance("{module_api_name}", "{record_id}"); // To get record instance
    $responseIns = $record->delete();
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/record-samples.html?src=delete_record)

- v3.x.x

    ```php
    //Get instance of RecordOperations Class
    $recordOperations = new RecordOperations();
    //Get instance of ParameterMap Class
    $paramInstance = new ParameterMap();
    $paramInstance->add(DeleteRecordParam::wfTrigger(), false);
    //Call deleteRecord method that takes paramInstance, ModuleAPIName and recordId as parameter.
    $response = $recordOperations->deleteRecord($recordId,$moduleAPIName, $paramInstance);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/record-samples.html?src=delete_record)

### Convert a Record

- v2.x.x

    ```php
    $record = ZCRMRestClient::getInstance()->getRecordInstance("Leads", "{lead_id}"); // To get record instance
    $deal = ZCRMRecord::getInstance("deals", Null); // to get the record of deal in form of ZCRMRecord insatnce
    $deal->setFieldValue("Deal_Name", "test3"); // to set the deal name
    $deal->setFieldValue("Stage", "Qualification"); // to set the stage
    $deal->setFieldValue("Closing_Date", "2016-03-30"); // to set the closing date
    $details = array("overwrite"=>TRUE,"notify_lead_owner"=>TRUE,"notify_new_entity_owner"=>TRUE,"Accounts"=>"{account_id}","Contacts"=>"{contact_id}","assign_to"=>"{user_id}");
    $responseIn = $record->convert($deal, $details); // to convert record
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/record-samples.html?src=convert_record)

- v3.x.x

    ```php
    //Get instance of RecordOperations Class
    $recordOperations = new RecordOperations();
    //Get instance of ConvertBodyWrapper Class that will contain the request body
    $request = new ConvertBodyWrapper();
    //List of LeadConverter instances
    $data = array();
    //Get instance of LeadConverter Class
    $record1 = new LeadConverter();
    $record1->setOverwrite(true);
    $record1->setNotifyLeadOwner(true);
    $record1->setNotifyNewEntityOwner(true);
    $record1->setAccounts("34770615848125");
    $record1->setContacts("3477061358009");
    $record1->setAssignTo("3477061173021");
    $recordClass = 'com\zoho\crm\api\record\Record';
    $deals = new $recordClass();
    /*
        * Call addFieldValue method that takes two arguments
        * 1 -> Call Field "." and choose the module from the displayed list and press "." and choose the field name from the displayed list.
        * 2 -> Value
        */
    $field = new Field("");
    // $deals->addFieldValue(Deals::DealName(), "deal_name");
    // $deals->addFieldValue(Deals::Description(), "deals description");
    // $deals->addFieldValue(Deals::ClosingDate(), new \DateTime("2021-06-02"));
    // $deals->addFieldValue(Deals::Stage(), new Choice("Closed Won"));
    // $deals->addFieldValue(Deals::Amount(), 50.7);
    /*
        * Call addKeyValue method that takes two arguments
        * 1 -> A string that is the Field's API Name
        * 2 -> Value
        */
    $deals->addKeyValue("Custom_field", "Value");
    $deals->addKeyValue("Custom_field_2", "value");
    $carryOverTags = new CarryOverTags();
    $carryOverTags->setAccounts(["Test"]);
    $carryOverTags->setContacts(["Test"]);
    $carryOverTags->setDeals(["Test"]);
    $record1->setCarryOverTags($carryOverTags);
    // $record1->setDeals($deals);
    //Add Record instance to the list
    array_push($data, $record1);
    //Set the list to Records in BodyWrapper instance
    $request->setData($data);
    //Call updateRecord method that takes BodyWrapper instance, ModuleAPIName and recordId as parameter.
    $response = $recordOperations->convertLead($recordId,$request );
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/record-samples.html?src=convert)

### Upload a Photo

- v2.x.x

    ```php
    $record = ZCRMRestClient::getInstance()->getRecordInstance("{module_api_name}", "{record_id}"); // To get record instance
    $responseIns = $record->uploadPhoto("path/to/photo"); // $photoPath - absolute path of the photo to be uploaded.
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/record-samples.html?src=upload_photo)

- v3.x.x

    ```php
    //Get instance of RecordOperations Class
    $recordOperations = new RecordOperations();
    //Get instance of FileBodyWrapper class that will contain the request file
    $fileBodyWrapper = new FileBodyWrapper();
    //Get instance of StreamWrapper class that takes absolute path of the file to be attached as parameter
    $streamWrapper = new StreamWrapper(null, null, $absoluteFilePath);
    //Set file to the FileBodyWrapper instance
    $fileBodyWrapper->setFile($streamWrapper);
    //Call uploadPhoto method that takes FileBodyWrapper instance, moduleAPIName and recordId as parameter
    $response = $recordOperations->uploadPhoto($recordId, $moduleAPIName,$fileBodyWrapper);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/record-samples.html?src=upload_photo)

### Download a Photo

- v2.x.x

    ```php
    $record = ZCRMRestClient::getInstance()->getRecordInstance("{module_api_name}", "{record_id}"); // To get record instance
    $fileResponseIns = $record->downloadPhoto(); // to download the photo
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/record-samples.html?src=download_photo)

- v3.x.x

    ```php
    //Get instance of RecordOperations Class
    $recordOperations = new RecordOperations();
    //Call downloadAttachment method that takes moduleAPIName and recordId as parameters
    $response = $recordOperations->getPhoto($recordId,$moduleAPIName );
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/record-samples.html?src=get_photo)

### Delete a Photo

- v2.x.x

    ```php
    $record = ZCRMRestClient::getInstance()->getRecordInstance("{module_api_name}", "{record_id}"); // To get record instance
    $responseIns = $record->deletePhoto(); // $photoPath - absolute path of the photo to be uploaded.
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/record-samples.html?src=delete_photo)

- v3.x.x

    ```php
    //Get instance of RecordOperations Class
    $recordOperations = new RecordOperations();
    //Call getAttachments method that takes moduleAPIName and recordId as parameter
    $response = $recordOperations->deletePhoto($recordId,$moduleAPIName);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/record-samples.html?src=delete_photo)

## Tags

### Get Tags

- v2.x.x

    ```php
    $moduleIns = ZCRMRestClient::getInstance()->getModuleInstance("module_api_name"); // to get the instance of the module
    $tags = $moduleIns->getTags(); // to get the trashrecords inform of ZCRMTag array instances
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/module-sample.html?src=get_tags)

- v3.x.x

    ```php
    $tagsOperations = new TagsOperations();
    //Get instance of ParameterMap Class
    $paramInstance = new ParameterMap();
    $paramInstance->add(GetTagsParam::module(), $moduleAPIName);
    // $paramInstance->add(GetTagsParam::myTags(), ""); //Displays the names of the tags created by the current user.
    //Call getTags method that takes paramInstance as parameter
    $response = $tagsOperations->getTags($paramInstance);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/tags-samples.html?src=get_tags)

### Get Tag Count

- v2.x.x

    ```php
    $moduleIns = ZCRMRestClient::getInstance()->getModuleInstance("{module_api_name}"); // to get the instance of the module
    $tag_count = $moduleIns->getTagCount("{record_id}");
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/module-sample.html?src=tag_count)

- v3.x.x

    ```php
    $tagsOperations = new TagsOperations();
    //Get instance of ParameterMap Class
    $paramInstance = new ParameterMap();
    $paramInstance->add(GetRecordCountForTagParam::module(), $moduleAPIName);
    //Call getRecordCountForTag method that takes paramInstance and tagId as parameter
    $response = $tagsOperations->getRecordCountForTag($tagId,$paramInstance);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/tags-samples.html?src=count)

### Create Tags

- v2.x.x

    ```php
    $moduleIns = ZCRMRestClient::getInstance()->getModuleInstance("{module_api_name}"); // to get the module instance
    $tags = array(); // to create ZCRMTag instances array
    $tag = ZCRMTag::getInstance(); // to get the tag instance
    $tag->setName("test4"); // to set the tag name
    array_push($tags, $tag); // to push the tag to array of ZCRMTag instances
    $responseIn = $moduleIns->createTags($tags); // to create the tags
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/module-sample.html?src=create_tags)

- v3.x.x

    ```php
    //Get instance of TagsOperations Class
    $tagsOperations = new TagsOperations();
    //Get instance of BodyWrapper Class that will contain the request body
    $request = new BodyWrapper();
    //Get instance of ParameterMap Class
    $paramInstance = new ParameterMap();
    $paramInstance->add(CreateTagsParam::module(), $moduleAPIName);
    //List of Tag instances
    $tagList = array();
    $tagClass = 'com\zoho\crm\api\tags\Tag';
    //Get instance of Tag Class
    $tag1 = new $tagClass();
    $tag1->setName("tagName");
    array_push($tagList, $tag1);
    $request->setTags($tagList);
    //Call createTags method that takes BodyWrapper instance and paramInstance as parameter
    $response = $tagsOperations->createTags($request, $paramInstance);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/tags-samples.html?src=create_tags)

### Update Tags

- v2.x.x

    ```php
    $moduleIns = ZCRMRestClient::getInstance()->getModuleInstance("{module_api_name}"); // to get the module instance
    $tags = array(); // to create ZCRMTag instances array
    $tag = ZCRMTag::getInstance("{tag_id}"); // to get the tag instance
    $tag->setName("testnew"); // to set the tag name
    array_push($tags, $tag); // to push the tag to array of ZCRMTag instances
    $tag = ZCRMTag::getInstance("{tag_id}"); // to get the tag instance
    $tag->setName("testnew2"); // to set the tag name
    array_push($tags, $tag); // to push the tag to array of ZCRMTag instances
    $responseIn = $moduleIns->updateTags($tags); // to update the tags
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/module-sample.html?src=update_tags)

- v3.x.x

    ```php
    //Get instance of TagsOperations Class
    $tagsOperations = new TagsOperations();
    //Get instance of BodyWrapper Class that will contain the request body
    $request = new BodyWrapper();
    //Get instance of ParameterMap Class
    $paramInstance = new ParameterMap();
    $paramInstance->add(UpdateTagsParam::module(), $moduleAPIName);
    //List of Tag instances
    $tagList = array();
    $tagClass = 'com\zoho\crm\api\tags\Tag';
    //Get instance of Tag Class
    $tag1 = new $tagClass();
    $tag1->setId("34770616454014");
    $tag1->setName("tagName1");
    array_push($tagList, $tag1);
    $request->setTags($tagList);
    //Call updateTags method that takes BodyWrapper instance and paramInstance as parameter
    $response = $tagsOperations->updateTags($request, $paramInstance);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/tags-samples.html?src=update_tags)

### Add Tags to Records

- v2.x.x

    ```php
    $moduleIns = ZCRMRestClient::getInstance()->getModuleInstance("Leads"); // to get the module instance
    $recordids = array(
        "{record_id}",
    ); // array of record ids from which tags must be added
    $tagnames = array(
        "tea",
        "test2",
        "test3"
    ); // array of tags to be added
    $responseIn = $moduleIns->addTagsToRecords($recordids, $tagnames); // to add the tags to the record
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/module-sample.html?src=add_tags)

- v3.x.x

    ```php
    //Get instance of TagsOperations Class
    $tagsOperations = new TagsOperations();
    //Get instance of ParameterMap Class
    $paramInstance = new ParameterMap();
    foreach($tagNames as $tagName)
    {
        $paramInstance->add(AddTagsToMultipleRecordsParam::tagNames(), $tagName);
    }
    foreach($recordIds as $recordId)
    {
        $paramInstance->add(AddTagsToMultipleRecordsParam::ids(), $recordId);
    }
    $paramInstance->add(AddTagsToMultipleRecordsParam::overWrite(), "false");
    //Call addTagsToMultipleRecords method that takes paramInstance, moduleAPIName as parameter
    $response = $tagsOperations->addTagsToMultipleRecords($moduleAPIName,$paramInstance);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/tags-samples.html?src=add_to_records)

### Remove Tags from Records

- v2.x.x

    ```php
    $moduleIns = ZCRMRestClient::getInstance()->getModuleInstance("{module_api_name}"); // to get the module instance
    $recordids = array(
        "{record_id}",
        "{record_id}"
    ); // array of record ids from which tags must be removed
    $tagnames = array(
        "tea",
        "test2",
        "test3"
    ); // array of tags to be removed
    $responseIn = $moduleIns->removeTagsFromRecords($recordids, $tagnames); // to remove the tags from the records
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/module-sample.html?src=remove_tags)

- v3.x.x

    ```php
    //Get instance of TagsOperations Class
    $tagsOperations = new TagsOperations();
    $paramInstance = new ParameterMap();
    foreach($tagNames as $tagName)
    {
        $paramInstance->add(RemoveTagsFromMultipleRecordsParam::tagNames(), $tagName);
    }
    foreach($recordIds as $recordId)
    {
        $paramInstance->add(RemoveTagsFromMultipleRecordsParam::ids(), $recordId);
    }
    //Call RemoveTagsFromMultipleRecordsParam method that takes paramInstance, moduleAPIName as parameter
    $response = $tagsOperations->removeTagsFromMultipleRecords($moduleAPIName, $paramInstance);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/tags-samples.html?src=remove_from_records)

### Add Tags to Record

- v2.x.x

    ```php
    $record = ZCRMRestClient::getInstance()->getRecordInstance("{module_api_name}", "{record_id}"); // To get record instance
    $tagNames = array(
        "test1",
        "test2"
    ); // to create array of tag names
    $responseIns = $record->addTags($tagNames); // to add tags
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/record-samples.html?src=add_tags_to_records)

- v3.x.x

    ```php
    //Get instance of TagsOperations Class
    $tagsOperations = new TagsOperations();
    //Get instance of ParameterMap Class
    $paramInstance = new ParameterMap();
    foreach($tagNames as $tagName)
    {
        $paramInstance->add(AddTagsToRecordParam::tagNames(), $tagName);
    }
    $paramInstance->add(AddTagsToRecordParam::overWrite(), "false");
    //Call addTagsToRecord method that takes paramInstance, moduleAPIName and recordId as parameter
    $response = $tagsOperations->addTagsToRecord($recordId, $moduleAPIName,$paramInstance);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/tags-samples.html?src=add_to_record)

### Remove Tags from Record

- v2.x.x

    ```php
    $record = ZCRMRestClient::getInstance()->getRecordInstance("{module_api_name}", "{record_id}"); // To get record instance
    $tagNames = array(
        "test1",
        "test2"
    ); // to create array of tag names
    $responseIns = $record->removeTags($tagNames); // to remove tags
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/record-samples.html?src=remove_tags_from_records)

- v3.x.x

    ```php
    //Get instance of TagsOperations Class
    $tagsOperations = new TagsOperations();
    //Get instance of ParameterMap Class
    $paramInstance = new ParameterMap();
    foreach($tagNames as $tagName)
    {
        $paramInstance->add(RemoveTagsFromRecordParam::tagNames(), $tagName);
    }
    //Call removeTagsFromRecord method that takes paramInstance, moduleAPIName and recordId as parameter
    $response = $tagsOperations->removeTagsFromRecord($recordId, $moduleAPIName,$paramInstance);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/tags-samples.html?src=remove_from_record)

## Attachments

### Get Attachments

- v2.x.x

    ```php
    /* For VERSION <=2.0.6 $records = ZCRMRestClient::getInstance()->getRecordInstance("{module_api_name}", "{record_id}"); // To get record instance
    $responseIns = $records->getAttachments(1, 50); // to get the attachments */
    $record = ZCRMRestClient::getInstance()->getRecordInstance("{module_api_name}", "{record_id}"); // To get record instance
    $param_map=array("page"=>"1","per_page"=>"200"); // key-value pair containing all the parameters - optional
    $header_map = array("if-modified-since"=>"2019-12-12T15:26:49+05:30"); // key-value pair containing all the headers - optional
    $responseIns = $record->getAttachments($param_map, $header_map); // to get the attachments
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/record-samples.html?src=get_attachments)

- v3.x.x

    ```php
    //Get instance of AttachmentsOperations Class that takes recordId and moduleAPIName as parameter
    $attachmentOperations = new AttachmentsOperations($moduleAPIName, $recordId);
    //Call getAttachments method
    $response = $attachmentOperations->getAttachments();
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/attachments-samples.html?src=get_attachments)

### Upload an Attachment

- v2.x.x

    ```php
    $record = ZCRMRestClient::getInstance()->getRecordInstance("{module_api_name}", "{record_id}"); // To get record instance
    $responseIns = $record->uploadAttachment("/path/to/file"); // $filePath - absolute path of the attachment to be uploaded.
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/record-samples.html?src=upload_attachments)

- v3.x.x

    ```php
    //Get instance of AttachmentsOperations Class that takes recordId and moduleAPIName as parameter
    $attachmentOperations = new AttachmentsOperations($moduleAPIName, $recordId);
    //Get instance of FileBodyWrapper class that will contain the request file
    $fileBodyWrapper = new FileBodyWrapper();
    //Get instance of StreamWrapper class that takes absolute path of the file to be attached as parameter
    $streamWrapper = new StreamWrapper(null, null, $absoluteFilePath);
    //Set file to the FileBodyWrapper instance
    $fileBodyWrapper->setFile($streamWrapper);
    //Call uploadAttachment method that takes FileBodyWrapper instance as parameter
    $response = $attachmentOperations->uploadAttachment($fileBodyWrapper);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/attachments-samples.html?src=upload_attachments)

### Upload Link as an Attachment

- v2.x.x

    ```php
    $record = ZCRMRestClient::getInstance()->getRecordInstance("{module_api_name}", "{record_id}"); // To get record instance
    $responseIns = $record->uploadLinkAsAttachment("{link}"); // $filePath - absolute path of the attachment to be uploaded.
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/record-samples.html?src=link_attachments)

- v3.x.x

    ```php
    /Get instance of AttachmentsOperations Class that takes recordId and moduleAPIName as parameter
    $attachmentOperations = new AttachmentsOperations($moduleAPIName, $recordId);
    //Get instance of ParameterMap Class
    $paramInstance = new ParameterMap();
    $paramInstance->add(UploadLinkAttachmentParam::attachmentUrl(), $attachmentURL);
    //Call uploadAttachment method that takes paramInstance as parameter
    $response = $attachmentOperations->uploadLinkAttachment($paramInstance);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/attachments-samples.html?src=upload_link_as_attachment)

### Download an Attachment

- v2.x.x

    ```php
    $record = ZCRMRestClient::getInstance()->getRecordInstance("{module_api_name}", "{record_id}"); // To get record instance
    $fileResponseIns = $record->downloadAttachment("{attachment_id}");
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/record-samples.html?src=download_attachments)

- v3.x.x

    ```php
    //Get instance of AttachmentsOperations Class that takes recordId and moduleAPIName as parameter
    $attachmentOperations = new AttachmentsOperations($moduleAPIName, $recordId);
    //Call downloadAttachment method that takes attachmentId as parameters
    $response = $attachmentOperations->downloadAttachment($attachmentId);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/attachments-samples.html?src=download_an_attachment)

### Delete an Attachment

- v2.x.x

    ```php
    $record = ZCRMRestClient::getInstance()->getRecordInstance("{module_api_name}", "{record_id}"); // To get record instance
    $fileResponseIns = $record->deleteAttachment("{attachment_id}");
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/record-samples.html?src=delete_attachments)

- v3.x.x

    ```php
    //Get instance of AttachmentsOperations Class that takes recordId and moduleAPIName as parameter
    $attachmentOperations = new AttachmentsOperations($moduleAPIName, $recordId);
    //Call deleteAttachment method that takes attachmentId as parameter
    $response = $attachmentOperations->deleteAttachment($attachmentId);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/attachments-samples.html?src=delete_an_attachment)

## RelatedRecords

### Update a Related Record

- v2.x.x

    ```php
    $record = ZCRMRestClient::getInstance()->getRecordInstance("{module_api_name}", "{record_id}"); // To get record instance
    $junctionrecord = ZCRMJunctionRecord::getInstance("{module_api_name}", "{record_id}"); // to get the junction record instance
    $responseIns = $record->addRelation($junctionrecord); // to add a relation between the record and the junction record
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/record-samples.html?src=add_relation)

- v3.x.x

    ```php
    //Get instance of RelatedRecordsOperations Class that takes moduleAPIName, recordId and relatedListAPIName as parameter
    $relatedRecordsOperations = new RelatedRecordsOperations( $relatedListAPIName,  $recordId,  $moduleAPIName);
    //Get instance of BodyWrapper Class that will contain the request body
    $request = new BodyWrapper();
    //List of Record instances
    $records = array();
    //Get instance of Record Class
    $record1 = new Record();
    /*
        * Call addKeyValue method that takes two arguments
        * 1 -> A string that is the Field's API Name
        * 2 -> Value
        */
    $record1->addKeyValue("list_price", 50.56);
    //Add Record instance to the list
    array_push($records, $record1);
    //Set the list to Records in BodyWrapper instance
    $request->setData($records);
    //Call updateRecord method that takes BodyWrapper instance, relatedRecordId as parameter.
    $response = $relatedRecordsOperations->updateRelatedRecord($relatedListId,$request);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/rel-records-samples.html?src=update_rel_record)

### Remove Relation between Records

- v2.x.x

    ```php
    $record = ZCRMRestClient::getInstance()->getRecordInstance("{module_api_name}", "{record_id}"); // To get record instance
    $junctionrecord = ZCRMJunctionRecord::getInstance("{module_api_name}", "{record_id}"); // to get the junction record instance
    $responseIns = $record->removeRelation($junctionrecord); // to add a relation between the record and the junction record
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/record-samples.html?src=remove_relation)

- v3.x.x

    ```php
    //Get instance of RelatedRecordsOperations Class that takes moduleAPIName, recordId and relatedListAPIName as parameter
    $relatedRecordsOperations = new RelatedRecordsOperations($relatedListAPIName,$recordId,$moduleAPIName);
    //Call updateRecord method that takes relatedListId as parameter.
    $response = $relatedRecordsOperations->delinkRecord($relatedListId);
    ```

    [sample code](https://www.zoho.com/crm/developer/docs/php-sdk/v3/rel-records-samples.html?src=delink_single)
