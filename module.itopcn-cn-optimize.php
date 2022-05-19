<?php
/**
 * @copyright   Copyright (C) 2020 ops-itop
 * @license     NIT
 */

SetupWebPage::AddModule(
	__FILE__,
	'itopcn-cn-optimize/1.0.0',
	array(
		// Identification
		//
		'label' => 'iTop中国用户优化',
		'category' => 'business',

		// Setup
		//
		'dependencies' => array(
			'itop-config-mgmt/2.7.0',
		),
		'mandatory' => false,
		'visible' => true, // To prevent auto-install but shall not be listed in the install wizard
		'installer' => 'CNOptimizeInstaller',

		// Components
		//
		'datamodel' => array(
			'model.itopcn-cn-optimize.php',
		),
		'data.struct' => array(
		),
		'data.sample' => array(
		),
		
		// Documentation
		//
		'doc.manual_setup' => '',
		'doc.more_information' => '',

		// Default settings
		//
		'settings' => array(
		),
	)
);

if (!class_exists('CNOptimizeInstaller')) {
	class CNOptimizeInstaller extends ModuleInstallerAPI {
		public static function BeforeWritingConfig(Config $oConfiguration) {
			$sUrl = $oConfiguration->Get("app_root_url");
			$oConfiguration->Set("app_icon_url", $sUrl, "yes");
			$oConfiguration->Set("timezone", "Asia/Shanghai");
			$oConfiguration->Set("export_pdf_font", "DroidSansFallback", "yes");
			$oConfiguration->Set("csv_file_default_charset", "UTF-8");
			return $oConfiguration;
		}

		public static function AfterDataLoad(Config $oConfiguration, $sPreviousVersion, $sCurrentVersion) {
			$oAdmin = MetaModel::GetObject("URP_Profiles", 1);
			$oAdmin->Set("description", "拥有所有权限(绕过任何控制)");
			$oAdmin->DBWrite();
		}
	}
}
