<?php

return [
  'name' => 'Mailing',
  'table' => 'civicrm_mailing',
  'class' => 'CRM_Mailing_DAO_Mailing',
  'getInfo' => fn() => [
    'title' => ts('Mailing'),
    'title_plural' => ts('Mailings'),
    'description' => ts('Mass emails sent from CiviMail.'),
    'icon' => 'fa-envelope-o',
    'label_field' => 'name',
  ],
  'getPaths' => fn() => [
    'add' => 'civicrm/mailing/send',
    'update' => 'civicrm/mailing/send?mid=[id]&continue=true',
    'copy' => 'civicrm/mailing/send?mid=[id]',
    'view' => 'civicrm/mailing/report?mid=[id]&reset=1',
    'preview' => 'civicrm/mailing/view?id=[id]&reset=1',
    'delete' => 'civicrm/mailing/browse?action=delete&mid=[id]&reset=1',
  ],
  'getIndices' => fn() => [
    'index_hash' => [
      'fields' => [
        'hash' => TRUE,
      ],
      'add' => '4.5',
    ],
  ],
  'getFields' => fn() => [
    'id' => [
      'title' => ts('Mailing ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'required' => TRUE,
      'primary_key' => TRUE,
      'auto_increment' => TRUE,
    ],
    'domain_id' => [
      'title' => ts('Domain ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'description' => ts('Which site is this mailing for'),
      'add' => '3.4',
      'input_attrs' => [
        'label' => ts('Domain'),
      ],
      'pseudoconstant' => [
        'table' => 'civicrm_domain',
        'key_column' => 'id',
        'label_column' => 'name',
      ],
      'entity_reference' => [
        'entity' => 'Domain',
        'key' => 'id',
        'on_delete' => 'SET NULL',
      ],
    ],
    'header_id' => [
      'title' => ts('Header ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'description' => ts('FK to the header component.'),
      'input_attrs' => [
        'label' => ts('Header'),
      ],
      'pseudoconstant' => [
        'table' => 'civicrm_mailing_component',
        'key_column' => 'id',
        'label_column' => 'name',
        'condition' => 'component_type = "Header"',
      ],
      'entity_reference' => [
        'entity' => 'MailingComponent',
        'key' => 'id',
        'on_delete' => 'SET NULL',
      ],
    ],
    'footer_id' => [
      'title' => ts('Footer ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'description' => ts('FK to the footer component.'),
      'input_attrs' => [
        'label' => ts('Footer'),
      ],
      'pseudoconstant' => [
        'table' => 'civicrm_mailing_component',
        'key_column' => 'id',
        'label_column' => 'name',
        'condition' => 'component_type = "Footer"',
      ],
      'entity_reference' => [
        'entity' => 'MailingComponent',
        'key' => 'id',
        'on_delete' => 'SET NULL',
      ],
    ],
    'reply_id' => [
      'title' => ts('Reply ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'description' => ts('FK to the auto-responder component.'),
      'input_attrs' => [
        'label' => ts('Reply'),
      ],
      'entity_reference' => [
        'entity' => 'MailingComponent',
        'key' => 'id',
        'on_delete' => 'SET NULL',
      ],
    ],
    'unsubscribe_id' => [
      'title' => ts('Unsubscribe ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'description' => ts('FK to the unsubscribe component.'),
      'input_attrs' => [
        'label' => ts('Unsubscribe'),
      ],
      'entity_reference' => [
        'entity' => 'MailingComponent',
        'key' => 'id',
        'on_delete' => 'SET NULL',
      ],
    ],
    'resubscribe_id' => [
      'title' => ts('Mailing Resubscribe'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
    ],
    'optout_id' => [
      'title' => ts('Opt Out ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'description' => ts('FK to the opt-out component.'),
      'input_attrs' => [
        'label' => ts('Opt Out'),
      ],
      'entity_reference' => [
        'entity' => 'MailingComponent',
        'key' => 'id',
        'on_delete' => 'SET NULL',
      ],
    ],
    'name' => [
      'title' => ts('Mailing Name'),
      'sql_type' => 'varchar(128)',
      'input_type' => 'Text',
      'description' => ts('Mailing Name.'),
      'unique_name' => 'mailing_name',
      'input_attrs' => [
        'label' => ts('Name'),
      ],
    ],
    'mailing_type' => [
      'title' => ts('Mailing Type'),
      'sql_type' => 'varchar(32)',
      'input_type' => 'Select',
      'description' => ts('differentiate between standalone mailings, A/B tests, and A/B final-winner'),
      'add' => '4.6',
      'pseudoconstant' => [
        'callback' => 'CRM_Mailing_PseudoConstant::mailingTypes',
      ],
    ],
    'from_name' => [
      'title' => ts('Mailing From Name'),
      'sql_type' => 'varchar(128)',
      'input_type' => 'Text',
      'description' => ts('From Header of mailing'),
      'input_attrs' => [
        'label' => ts('From Name'),
      ],
    ],
    'from_email' => [
      'title' => ts('Mailing From Email'),
      'sql_type' => 'varchar(128)',
      'input_type' => 'Text',
      'description' => ts('From Email of mailing'),
      'input_attrs' => [
        'label' => ts('From Email'),
      ],
    ],
    'replyto_email' => [
      'title' => ts('Replyto Email'),
      'sql_type' => 'varchar(128)',
      'input_type' => 'Text',
      'description' => ts('Reply-To Email of mailing'),
      'input_attrs' => [
        'label' => ts('Reply-To Email'),
      ],
    ],
    'template_type' => [
      'title' => ts('Template Type'),
      'sql_type' => 'varchar(64)',
      'input_type' => 'Select',
      'required' => TRUE,
      'description' => ts('The language/processing system used for email templates.'),
      'add' => '4.7',
      'default' => 'traditional',
      'pseudoconstant' => [
        'callback' => 'CRM_Mailing_BAO_Mailing::getTemplateTypeNames',
      ],
    ],
    'template_options' => [
      'title' => ts('Template Options (JSON)'),
      'sql_type' => 'longtext',
      'input_type' => 'TextArea',
      'description' => ts('Advanced options used by the email templating system. (JSON encoded)'),
      'add' => '4.7',
      'serialize' => CRM_Core_DAO::SERIALIZE_JSON,
    ],
    'subject' => [
      'title' => ts('Subject'),
      'sql_type' => 'varchar(128)',
      'input_type' => 'Text',
      'description' => ts('Subject of mailing'),
      'input_attrs' => [
        'label' => ts('Subject'),
      ],
    ],
    'body_text' => [
      'title' => ts('Body Text'),
      'sql_type' => 'longtext',
      'input_type' => 'TextArea',
      'description' => ts('Body of the mailing in text format.'),
      'input_attrs' => [
        'label' => ts('Body Text'),
      ],
    ],
    'body_html' => [
      'title' => ts('Body Html'),
      'sql_type' => 'longtext',
      'input_type' => 'TextArea',
      'description' => ts('Body of the mailing in html format.'),
      'input_attrs' => [
        'label' => ts('Body HTML'),
      ],
    ],
    'url_tracking' => [
      'title' => ts('Url Tracking'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Should we track URL click-throughs for this mailing?'),
      'default' => FALSE,
      'input_attrs' => [
        'label' => ts('Url Tracking'),
      ],
    ],
    'forward_replies' => [
      'title' => ts('Forward Replies'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Should we forward replies back to the author?'),
      'default' => FALSE,
      'input_attrs' => [
        'label' => ts('Forward Replies'),
      ],
    ],
    'auto_responder' => [
      'title' => ts('Auto Responder'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Should we enable the auto-responder?'),
      'default' => FALSE,
      'input_attrs' => [
        'label' => ts('Auto Responder'),
      ],
    ],
    'open_tracking' => [
      'title' => ts('Track Mailing?'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Should we track when recipients open/read this mailing?'),
      'default' => FALSE,
    ],
    'is_completed' => [
      'title' => ts('Mailing Completed'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Has at least one job associated with this mailing finished?'),
      'default' => FALSE,
    ],
    'msg_template_id' => [
      'title' => ts('Message Template ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'description' => ts('FK to the message template.'),
      'input_attrs' => [
        'label' => ts('Message Template'),
      ],
      'entity_reference' => [
        'entity' => 'MessageTemplate',
        'key' => 'id',
        'on_delete' => 'SET NULL',
      ],
    ],
    'override_verp' => [
      'title' => ts('Override Verp'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Overwrite the VERP address in Reply-To'),
      'add' => '2.2',
      'default' => FALSE,
      'input_attrs' => [
        'label' => ts('Overwrite VERP'),
      ],
    ],
    'created_id' => [
      'title' => ts('Created By Contact ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'description' => ts('FK to Contact ID who first created this mailing'),
      'input_attrs' => [
        'label' => ts('Creator'),
      ],
      'entity_reference' => [
        'entity' => 'Contact',
        'key' => 'id',
        'on_delete' => 'SET NULL',
      ],
    ],
    'created_date' => [
      'title' => ts('Mailing Created Date'),
      'sql_type' => 'timestamp',
      'input_type' => 'Select Date',
      'description' => ts('Date and time this mailing was created.'),
      'add' => '3.0',
      'default' => 'CURRENT_TIMESTAMP',
      'input_attrs' => [
        'label' => ts('Created Date'),
        'format_type' => 'activityDateTime',
      ],
    ],
    'modified_date' => [
      'title' => ts('Modified Date'),
      'sql_type' => 'timestamp',
      'input_type' => 'Select Date',
      'readonly' => TRUE,
      'description' => ts('When the mailing (or closely related entity) was created or modified or deleted.'),
      'add' => '4.7',
      'unique_name' => 'mailing_modified_date',
      'default' => 'CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
      'usage' => [
        'export',
      ],
      'input_attrs' => [
        'label' => ts('Modified Date'),
      ],
    ],
    'scheduled_id' => [
      'title' => ts('Scheduled By Contact ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'description' => ts('FK to Contact ID who scheduled this mailing'),
      'input_attrs' => [
        'label' => ts('Scheduled By'),
      ],
      'entity_reference' => [
        'entity' => 'Contact',
        'key' => 'id',
        'on_delete' => 'SET NULL',
      ],
    ],
    'scheduled_date' => [
      'title' => ts('Mailing Scheduled Date'),
      'sql_type' => 'timestamp',
      'input_type' => 'Select Date',
      'description' => ts('Date and time this mailing was scheduled.'),
      'add' => '3.3',
      'default' => NULL,
      'input_attrs' => [
        'label' => ts('Scheduled Date'),
        'format_type' => 'activityDateTime',
      ],
    ],
    'start_date' => [
      'title' => ts('Mailing Start Date'),
      'sql_type' => 'timestamp',
      'description' => ts('When the mailing started to go out'),
      'required' => FALSE,
      'usage' => [
        'import' => FALSE,
        'export' => FALSE,
        'duplicate_matching' => FALSE,
        'token' => FALSE,
      ],
      'default' => NULL,
      'localizable' => 0,
      'html' => [
        'type' => 'Select Date',
        'formatType' => 'activityDateTime',
      ],
      'readonly' => TRUE,
      'add' => 5.76,
    ],
    'end_date' => [
      'sql_type' => 'timestamp',
      'title' => ts('Mailing End Date'),
      'description' => ts('When the mailing finished going out.'),
      'required' => FALSE,
      'usage' => [
        'import' => FALSE,
        'export' => FALSE,
        'duplicate_matching' => FALSE,
        'token' => FALSE,
      ],
      'default' => NULL,
      'localizable' => 0,
      'html' => [
        'type' => 'Select Date',
        'formatType' => 'activityDateTime',
      ],
      'readonly' => TRUE,
      'add' => 5.76,
    ],
    'status' => [
      'title' => ts('Mailing Status'),
      'sql_type' => 'varchar(32)',
      'description' => ts('The status of this mailing'),
      'maxlength' => 12,
      'size' => CRM_Utils_Type::TWELVE,
      'usage' => [
        'import' => FALSE,
        'export' => FALSE,
        'duplicate_matching' => FALSE,
        'token' => FALSE,
      ],
      'default' => 'Draft',
      'localizable' => 0,
      'html' => [
        'type' => 'Select',
      ],
      'pseudoconstant' => [
        'callback' => 'CRM_Core_SelectValues::getMailingJobStatus',
      ],
      'readonly' => TRUE,
      'add' => 5.76,
    ],
    'approver_id' => [
      'title' => ts('Approved By Contact ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'description' => ts('FK to Contact ID who approved this mailing'),
      'input_attrs' => [
        'label' => ts('Approved By'),
      ],
      'entity_reference' => [
        'entity' => 'Contact',
        'key' => 'id',
        'on_delete' => 'SET NULL',
      ],
    ],
    'approval_date' => [
      'title' => ts('Mailing Approved Date'),
      'sql_type' => 'timestamp',
      'input_type' => 'Select Date',
      'description' => ts('Date and time this mailing was approved.'),
      'add' => '3.3',
      'default' => NULL,
      'input_attrs' => [
        'format_type' => 'activityDateTime',
      ],
    ],
    'approval_status_id' => [
      'title' => ts('Approval Status'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Select',
      'description' => ts('The status of this mailing. Values: none, approved, rejected'),
      'add' => '3.3',
      'pseudoconstant' => [
        'option_group_name' => 'mail_approval_status',
      ],
    ],
    'approval_note' => [
      'title' => ts('Approval Note'),
      'sql_type' => 'longtext',
      'input_type' => 'TextArea',
      'description' => ts('Note behind the decision.'),
      'add' => '3.3',
    ],
    'is_archived' => [
      'title' => ts('Is Mailing Archived?'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Is this mailing archived?'),
      'add' => '2.2',
      'default' => FALSE,
    ],
    'visibility' => [
      'title' => ts('Mailing Visibility'),
      'sql_type' => 'varchar(40)',
      'input_type' => 'Select',
      'description' => ts('In what context(s) is the mailing contents visible (online viewing)'),
      'add' => '3.3',
      'default' => 'Public Pages',
      'input_attrs' => [
        'label' => ts('Visibility'),
      ],
      'pseudoconstant' => [
        'callback' => 'CRM_Core_SelectValues::groupVisibility',
      ],
    ],
    'campaign_id' => [
      'title' => ts('Campaign ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'description' => ts('The campaign for which this mailing has been initiated.'),
      'add' => '3.4',
      'component' => 'CiviCampaign',
      'input_attrs' => [
        'label' => ts('Campaign'),
      ],
      'pseudoconstant' => [
        'table' => 'civicrm_campaign',
        'key_column' => 'id',
        'label_column' => 'title',
        'prefetch' => 'disabled',
      ],
      'entity_reference' => [
        'entity' => 'Campaign',
        'key' => 'id',
        'on_delete' => 'SET NULL',
      ],
    ],
    'dedupe_email' => [
      'title' => ts('No Duplicate emails?'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Remove duplicate emails?'),
      'add' => '4.1',
      'default' => FALSE,
    ],
    'sms_provider_id' => [
      'title' => ts('SMS Provider ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Select',
      'add' => '4.2',
      'input_attrs' => [
        'label' => ts('SMS Provider'),
      ],
      'entity_reference' => [
        'entity' => 'SmsProvider',
        'key' => 'id',
        'on_delete' => 'SET NULL',
      ],
    ],
    'hash' => [
      'title' => ts('Mailing Hash'),
      'sql_type' => 'varchar(16)',
      'input_type' => NULL,
      'readonly' => TRUE,
      'description' => ts('Key for validating requests related to this mailing.'),
      'add' => '4.5',
    ],
    'location_type_id' => [
      'title' => ts('Location Type ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'description' => ts('With email_selection_method, determines which email address to use'),
      'add' => '4.6',
      'input_attrs' => [
        'label' => ts('Location Type'),
      ],
      'pseudoconstant' => [
        'table' => 'civicrm_location_type',
        'key_column' => 'id',
        'label_column' => 'display_name',
      ],
      'entity_reference' => [
        'entity' => 'LocationType',
        'key' => 'id',
        'on_delete' => 'SET NULL',
      ],
    ],
    'email_selection_method' => [
      'title' => ts('Email Selection Method'),
      'sql_type' => 'varchar(20)',
      'input_type' => 'Select',
      'description' => ts('With location_type_id, determine how to choose the email address to use.'),
      'add' => '4.6',
      'default' => 'automatic',
      'input_attrs' => [
        'label' => ts('Email Selection Method'),
      ],
      'pseudoconstant' => [
        'callback' => 'CRM_Core_SelectValues::emailSelectMethods',
      ],
    ],
    'language' => [
      'title' => ts('Mailing Language'),
      'sql_type' => 'varchar(5)',
      'input_type' => 'Select',
      'description' => ts('Language of the content of the mailing. Useful for tokens.'),
      'add' => '4.6',
      'pseudoconstant' => [
        'option_group_name' => 'languages',
        'key_column' => 'name',
      ],
    ],
  ],
];