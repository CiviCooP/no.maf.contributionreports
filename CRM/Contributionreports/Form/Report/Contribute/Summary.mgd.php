<?php
// This file declares a managed database record of type "ReportTemplate".
// The record will be automatically inserted, updated, or deleted from the
// database as appropriate. For more details, see "hook_civicrm_managed" at:
// http://wiki.civicrm.org/confluence/display/CRMDOC42/Hook+Reference
return array (
  0 => 
  array (
    'name' => 'CRM_Contributionreports_Form_Report_Contribute_Summary',
    'entity' => 'ReportTemplate',
    'params' => 
    array (
      'version' => 3,
      'label' => 'Contribution Summary (MAF Specific)',
      'description' => 'Customisation of the civicrm core contribution summary report. The customisation is that the payment instrument is added',
      'class_name' => 'CRM_Contributionreports_Form_Report_Contribute_Summary',
      'report_url' => 'no.maf.contributionreports/contributionsummary',
      'component' => 'CiviContribute',
    ),
  ),
);
