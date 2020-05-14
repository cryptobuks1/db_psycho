<?php

use App\Models\AccessRight;
use Illuminate\Database\Seeder;

class DatabaseUpdateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(DbTypeModelsTableSeeder::class);
//        $this->call(DbTypeModelFieldsTableSeeder::class);
//        $this->call(ControllersTableSeeder::class);
//        $this->call(ActionTypesTableSeeder::class);
//        $this->call(BeRoutesTableSeeder::class);
//        $this->call(FeComponentsTableSeeder::class);
//        $this->call(FeRouteUrlsTableSeeder::class);
//        $this->call(FeRoutesTableSeeder::class);
//        $this->call(FeUrlsTableSeeder::class);
//        $this->call(PartnerPointsTableSeeder::class);
//        $this->call(PartnerRegionsTableSeeder::class);
//        $this->call(PartnerTableSeeder::class);

//        $this->call(CalculationTemplateParameterSettingTableSeeder::class);
//        $this->call(CalculationTemplateTableSeeder::class);
//        $this->call(ExtensionOneAdditionalDetailTableSeeder::class);
//        $this->call(QuestionnaireTemplatesSeeder::class);
//        $this->call(QTPagesTableSeeder::class);
//        $this->call(QTBlocksTableSeeder::class);
//        $this->call(QTSetsTableSeeder::class);
//        $this->call(QTQuestionTypesTableSeeder::class);
//        $this->call(QTQuestionKindsTableSeeder::class);
//        $this->call(QTSetsQuestionsListTableSeeder::class);
//        $this->call(QTQuestionAnswerListTableSeeder::class);
//        $this->call(QTQuestionTablesTableSeeder::class);
//        $this->call(QTQuestionTableAttributesTableSeeder::class);
//        $this->call(QTAnswerScenariosTableSeeder::class);
//        $this->call(QTScenariosTableSeeder::class);
//        $this->call(QTValidationsTableSeeder::class);
//        $this->call(QTValidationRulesTableSeeder::class);

        $this->call(MenuItemsTableSeeder::class);
        $this->call(BeRoutesTableSeeder::class);

        $this->call(CaptionTableSeeder::class);
        $this->call(FeRoutesTableSeeder::class);
        $this->call(FeRouteUrlsTableSeeder::class);
        $this->call(FeRouteStepsSeeder::class);
        $this->call(FeUrlsTableSeeder::class);
        $this->call(TranslationCaptionsTableSeeder::class);
        $this->call(CaptionTableSeeder::class);
        $this->call(TranslationCaptionsTableSeeder::class);
        $this->call(ModelsTableSeed::class);
        $this->call(ModelLinksTableSeeder::class);
        $this->call(ControllersTableSeeder::class);

        $this->call(MenuItemAccessRolesSeeder::class);
        $this->call(MenuItemsTableSeeder::class);
        $this->call(AccessRolesTableSeeder::class);
        $this->call(UserInterfacesTableSeeder::class);
    }
}
