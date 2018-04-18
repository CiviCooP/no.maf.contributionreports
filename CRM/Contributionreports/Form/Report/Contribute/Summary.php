<?php

class CRM_Contributionreports_Form_Report_Contribute_Summary extends CRM_Report_Form_Contribute_Summary {
	
	public function __construct() {
		parent::__construct();
		$this->_columns['civicrm_contribution']['fields']['payment_instrument_id'] = array(
			'title' => ts('Payment Type'),
			'type' => CRM_Utils_Type::T_STRING,
		);
		$this->_columns['civicrm_contribution']['group_bys']['payment_instrument_id'] = array(
			'title' => ts('Payment Type'),
		);
	}
	
	/**
   * Modify column headers.
   */
  public function modifyColumnHeaders() {
    // use this method to modify $this->_columnHeaders
    $columnHeaders = array();
		if (isset($this->_columnHeaders['civicrm_financial_type_financial_type'])) {
			$columnHeaders['civicrm_financial_type_financial_type'] = $this->_columnHeaders['civicrm_financial_type_financial_type'];
			unset($this->_columnHeaders['civicrm_financial_type_financial_type']);
		}
		if (isset($this->_columnHeaders['civicrm_contribution_campaign_id'])) {
			$columnHeaders['civicrm_contribution_campaign_id'] = $this->_columnHeaders['civicrm_contribution_campaign_id'];
			unset($this->_columnHeaders['civicrm_contribution_campaign_id']);
		}
		if (isset($this->_columnHeaders['civicrm_contribution_payment_instrument_id'])) {
			$columnHeaders['civicrm_contribution_payment_instrument_id'] = $this->_columnHeaders['civicrm_contribution_payment_instrument_id'];
			unset($this->_columnHeaders['civicrm_contribution_payment_instrument_id']);
		}
		
		foreach($this->_columnHeaders as $key => $header) {
			$columnHeaders[$key] = $header;
		}

    $this->_columnHeaders = $columnHeaders;
  }
	
	public function alterDisplay(&$rows) {
		$entryFound = FALSE;
		$paymentInstruments = CRM_Contribute_BAO_Contribution::buildOptions('payment_instrument_id');
		foreach ($rows as $rowNum => $row) {
			if (isset($row['civicrm_contribution_payment_instrument_id'])) {
				$entryFound = TRUE;
				if (isset($paymentInstruments[$row['civicrm_contribution_payment_instrument_id']])) {
					$rows[$rowNum]['civicrm_contribution_payment_instrument_id'] = $paymentInstruments[$row['civicrm_contribution_payment_instrument_id']];
				}
			}
			// skip looking further in rows, if first row itself doesn't
      // have the column we need
      if (!$entryFound) {
        break;
      }
		}
		parent::alterDisplay($rows);
	}
	
}
