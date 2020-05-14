<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
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
        $this->call(AccessTypesTableSeeder::class);
        $this->call(ActionTypesTableSeeder::class);
        $this->call(CaptionTableSeeder::class);
        $this->call(ConsumerAccessRolesTableSeeder::class);
        $this->call(ConsumersTableSeeder::class);
        $this->call(ControllersTableSeeder::class);
        $this->call(DbTypeControllerFieldsTableSeeder::class);
        $this->call(DbTypeControllersTableSeeder::class);
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
        $this->call(AttachedDocumentKindTable::class);
        $this->call(AttacheDocumentTable::class);
        $this->call(TypeDocumentTableSeeder::class);
        $this->call(BankAccountTableSeeder::class);
        $this->call(BankAccountTypeTableSeeder::class);
        $this->call(BankTableSeeder::class);
        $this->call(CurrencyTableSeeder::class);
        $this->call(CryptoAccountsTableSeeder::class);
        $this->call(CryptoExchangesTableSeeder::class);
        $this->call(CryptoPlatformsTableSeeder::class);
        $this->call(CryptoTokenTableSeeder::class);
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
        $this->call(MenuItemsTableSeeder::class);

    }
}
