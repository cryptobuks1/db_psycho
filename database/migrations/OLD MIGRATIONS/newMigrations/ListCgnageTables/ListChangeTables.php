-------No Migration------
_ReasonsDataChange
__Activities
_ReasonsDataChange
ZzConsumers
_DbAreaByAccounts
__ReportTypes1C



-------Change field Migration------
_AccessEntitiesByRoles access_entity_id ->controller_id

AttachedDocumentTypes -> _AttachedDocumentTypes
AttachedDocumentFileTitle -> AttachedDocumentFileTitles
AttachedDocumentKinds -> _AttachedDocumentKinds

ZzContractorInfo contractor_id -> contractor_info_id

_DbTypeControllerFields  data_type_id -> data_types_id


-------NO field in Migration------
ZzCompanyInfo
    company_info_id
    line_n

Consumers
    consumer_is_system_n

CompanyInfo
    actual_l

_Banks
    country_id

CryptoAccounts
    table_n_service



-------No tables in PowerDesigner------
statuses
request_numbers
consumer_info
ConsumerActivityTokens
SystemParameters
SystemParametersValues
DbAreaFiles
AccessConsumerCompanies
AccessConsumerCompaniesContractors
AccessConsumerContractors
ConsumerActivityTokens

