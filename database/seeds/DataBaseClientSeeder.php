<?php

use Illuminate\Database\Seeder;

class DataBaseClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AccessEntitiesByRolesSeeder::class);
        $this->call(AccessRolesTableSeeder::class);
        $this->call(UserInterfacesTableSeeder::class);
        $this->call(AccessTypesTableSeeder::class);
        $this->call(ActionTypesTableSeeder::class);
        $this->call(CaptionTableSeeder::class);
        $this->call(ConsumerAccessRolesTableSeeder::class);
        $this->call(ConsumersTableSeeder::class);
        $this->call(ControllersTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(ModelsTableSeed::class);
        $this->call(SystemOperationsTableSeeder::class);
        $this->call(SystemParametersTableSeeder::class);
        $this->call(SystemParametersValuesTableSeeder::class);
        $this->call(DataTypesTableSeeder::class);
        $this->call(TranslationCaptionsTableSeeder::class);
        $this->call(DbAreaByAccountsSeeder::class);
        $this->call(DbAreasTableSeeder::class);
        $this->call(DbsTableSeeder::class);
        $this->call(DbTypeControllerFieldsTableSeeder::class);
        $this->call(DbTypeControllersTableSeeder::class);
        $this->call(DbTypesSeeder::class);
        $this->call(ServersDbsTableSeeder::class);
        $this->call(NameReportParamReportTableSeeder::class);
        $this->call(NameReportsTableSeeder::class);
        $this->call(ParamsReportTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(AttachedDocumentFileTitleTable::class);
//        $this->call(AttachedDocumentKindTable::class);
        $this->call(AttacheDocumentTable::class);
        $this->call(TypeDocumentTableSeeder::class);
//        $this->call(BankAccountTableSeeder::class);
//        $this->call(BankAccountTypeTableSeeder::class);
//        $this->call(BankTableSeeder::class);_ent
//        $this->call(CurrencyTableSeeder::class);
//        $this->call(CryptoAccountsTableSeeder::class);
//        $this->call(CryptoExchangesTableSeeder::class);
//        $this->call(CryptoPlatformsTableSeeder::class);
//        $this->call(CryptoTokenTableSeeder::class);
        $this->call(FileTypesTableSeeder::class);
        $this->call(ImageCategoriesTableSeeder::class);
        $this->call(ImageTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(ConsumerAccountsTableSeeder::class);
        $this->call(ContractorTableSeeder::class);
        $this->call(ContractorInfoSeeder::class);
        $this->call(AttachedDocumentFileTableSeeder::class);
        $this->call(ControllerLinksTableSeeder::class);
        $this->call(InfoTypeTableSeeder::class);
        $this->call(InfoKindTableSeeder::class);
        $this->call(AttachedDocumentTypeTableSeeder::class);
        $this->call(FeRoutesTableSeeder::class);
        $this->call(FeRouteUrlsTableSeeder::class);
        $this->call(FeUrlsTableSeeder::class);
        $this->call(BeRoutesTableSeeder::class);
        $this->call(MenuItemsTableSeeder::class);
        $this->call(MenuItemAccessRolesSeeder::class);
        $this->call(FeComponentsTableSeeder::class);
        $this->call(FeRouteStepsSeeder::class);
        $this->call(FeRouteObjectsTableSeeder::class);

        $this->call(FeItemsSeeder::class);
        $this->call(FeSetsSeeder::class);
        $this->call(FeSetsItemsSeeder::class);
        $this->call(FeCssClassesSeeder::class);
        $this->call(FeSetsItemsControllersSeeder::class);
        $this->call(AccessRightsTableSeeder::class);
        $this->call(ConsumerAccessRowsNewTableSeeder::class);

        // +++ BL Seeds
        $this->call(BlLeasingCalculationTableSeeder::class);
        $this->call(BlLeasingObjectGroupTableSeeder::class);
        $this->call(BlStatusTableSeeder::class);
        $this->call(BlContractorRequestTypeTableSeeder::class);
        $this->call(OneAdditionalDetailTableSeeder::class);
        $this->call(BlLeasingCalculationsTabAdditionalDetailTableSeeder::class);
        $this->call(BlLegalFormTableSeeder::class);
        $this->call(BlCustomerRequestTableSeeder::class);
        $this->call(BlCustomerRequestTabLeasingObjectTableSeeder::class);
        $this->call(BlLeasingObjectTypeTableSeeder::class);
        $this->call(RateVATTableSeeder::class);
        $this->call(BlLeasingObjectBrandTableSeeder::class);
        $this->call(BlScheduleArticleTableSeeder::class);
        $this->call(BlScheduleTableSeeder::class);
        $this->call(BlScheduleTabScheduleTableSeeder::class);
        $this->call(BlScheduleTypeTableSeeder::class);
        $this->call(BlLeasingContractTableSeeder::class);
        $this->call(ContractorContractsTableSeeder::class);
        $this->call(BlLeasingContractSpecificationTableSeeder::class);
        $this->call(BlLeasingContractSpecificationTabLeasingObjectsTableSeeder::class);
        $this->call(BlLeasingObjectModelTableSeeder::class);
        $this->call(PhysicalPersonTableSeeder::class);
        $this->call(PhysicalPersonInfoTableSeeder::class);
        $this->call(BlSalePointsTableSeeder::class);
        $this->call(BlScheduleTabArticleTableSeeder::class);
        $this->call(AccessRightByRolesTableSeeder::class);
        $this->call(BlLeasingSchedulePaymentsTableSeeder::class);
        $this->call(BlInsurancePolicyContractTableSeeder::class);
        $this->call(NotificationsTableSeeder::class);
        $this->call(HelpDevSeeder::class);
        $this->call(PageDevSeeder::class);
        $this->call(FaqDevSeeder::class);
        $this->call(SystemStatusTableSeeder::class);
        $this->call(DbAreaFilesTableSeeder::class);
        $this->call(StoredFilesTableSeeder::class);
        $this->call(InvoicesTableSeeder::class);
        $this->call(PaymentInvoicesTableSeeder::class);
        $this->call(ServiceAcceptanceActsTableSeeder::class);
        $this->call(BlAttachedDocumentKindsTableSeeder::class);
        $this->call(BlRequiredDocumentsTableSeeder::class);
        $this->call(BlInsurancePolicyContractTabLeasingContractTableSeeder::class);
        $this->call(PartnerTableSeeder::class);
        $this->call(PartnerRegionsTableSeeder::class);
        $this->call(PartnerPointsTableSeeder::class);
        $this->call(PartnerPointsTabContractorsTableSeeder::class);
        $this->call(CurrenciesTableSeeder::class);
        // --- BL Seeds */
        // записать сюда

        $this->call(ModelLinksTableSeeder::class);
        $this->call(DbTypeModelsTableSeeder::class);
        $this->call(DbTypeModelFieldsTableSeeder::class);

        $this->call(AccessAxesParametersTableSeeder::class);
        $this->call(AccessAxesTableSeeder::class);
        $this->call(AccessRowParametersTableSeeder::class);
        $this->call(ConsumerAccessRowParametersTableSeeder::class);
        $this->call(ConsumerAccessRowsTableSeeder::class);

        $this->call(QuestionnaireTemplatesSeeder::class);
        $this->call(QTPagesTableSeeder::class);
        $this->call(QTBlocksTableSeeder::class);
        $this->call(QTSetsTableSeeder::class);
        $this->call(QTQuestionTypesTableSeeder::class);
        $this->call(QTQuestionKindsTableSeeder::class);
        $this->call(QTSetsQuestionsListTableSeeder::class);
        $this->call(QTQuestionAnswerListTableSeeder::class);
        $this->call(QTQuestionTablesTableSeeder::class);
        $this->call(QTQuestionTableAttributesTableSeeder::class);
        $this->call(QTAnswerScenariosTableSeeder::class);
        $this->call(QTScenariosTableSeeder::class);
        $this->call(QTValidationsTableSeeder::class);
        $this->call(QTValidationRulesTableSeeder::class);

        $this->call(CalculationTemplateParameterSettingTableSeeder::class);
        $this->call(CalculationTemplateTableSeeder::class);
        $this->call(ExtensionOneAdditionalDetailTableSeeder::class);

    }
}
