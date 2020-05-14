// const Home = resolve => {
//     require.ensure(['../components/Home.vue'], () => {
//         resolve(require('../components/Home.vue'))
//     });
// };
//
// const List = resolve => {
//     require.ensure(['../components/List.vue'], () => {
//         resolve(require('../components/List.vue'));
//     });
// };
//
// const Card = resolve => {
//     require.ensure(['../components/Card.vue'], () => {
//         resolve(require('../components/Card.vue'));
//     });
// };
// const Report = resolve => {
//     require.ensure(['../components/Report.vue'], () => {
//         resolve(require('../components/Report.vue'));
//     });
// };
// const Profile = resolve => {
//     require.ensure(['../components/Profile.vue'], () => {
//         resolve(require('../components/Profile.vue'));
//     });
// };
// const Error = resolve => {
//     require.ensure(['../components/Error.vue'], () => {
//         resolve(require('../components/Error.vue'));
//     });
// };
// const Document = resolve => {
//     require.ensure(['../components/Document.vue'], () => {
//         resolve(require('../components/Document.vue'));
//     });
// };
// const TextPage = resolve => {
//     require.ensure(['../components/TextPage.vue'], () => {
//         resolve(require('../components/TextPage.vue'));
//     });
// };
// export const routes = [
//     ]
// export const routes1 = [
//     //General routes
//     {path: '*',redirect: '/404'},
//     {path: '/404',component: Error,meta:{}},
//     {path: '/403',component: Error,meta:{}},
//     {path: '/500',component: Error,meta:{}},
//     {path: '/', component: Home,meta: {}},
//     {path: '*/new',component: Card,meta: {}},
//
//     //Profile
//     {path: '/profile', component: Profile, meta: {}},
//     {path: '/profileTest', component: Profile, meta: {}},
//
//     //Text Page
//     {path: '/textPage', component: TextPage, meta: {}},
//
//
//     //externalReportsByCompanies
//     {path: '/externalReportsByCompanies', component: List, meta: {}},
//     {path: '/externalReportsByCompanies/create', component: Report, meta: {}},
//
//     //Documents
//     {path: '/documents', component: Document, meta: {}},
//     {path: '/documents2', component: Document, meta: {}},
//
//     //Contractors
//     {path: '/contractors', component: List, meta: {route: '/admin/contractor/list', id_field: 'id'}},
//     {
//         path: '/contractors/:id',
//         component: Card,
//         meta: {route: '/admin/contractor/card', id_field: 'id', model: 'Contractor', column: 'contractor_short_name'}
//     },
//
//     {path: '/contractors/:id/contactInfo', component: List, meta: {route: '/admin/contactInfoList', id_field: 'id',}},
//     {
//         path: '/contractors/:id/contactInfo/:cont_id',
//         component: Card,
//         meta: {route: '/admin/contactInfoCard', id_field: 'cont_id', model: 'InfoType', column: 'info_type_name'}
//     },
//
//     {
//         path: '/contractors/:id/cryptoExchangeAccounts',
//         component: List,
//         meta: {route: '/admin/contractor/cryptoExchangeAccounts/list', id_field: 'id',}
//     },
//     {
//         path: '/contractors/:id/cryptoExchangeAccounts/:cont_id',
//         component: Card,
//         meta: {
//             route: '/admin/contractor/cryptoExchangeAccounts/card',
//             id_field: 'cont_id',
//             model: 'contactInfo',
//             column: 'info_type_name'
//         }
//     },
//
//     {
//         path: '/contractors/:id/cryptoPlatformAccounts',
//         component: List,
//         meta: {route: '/admin/contractor/cryptoPlatformAccounts/list', id_field: 'id',}
//     },
//     {
//         path: '/contractors/:id/cryptoPlatformAccounts/:cont_id',
//         component: Card,
//         meta: {
//             route: '/admin/contractor/cryptoPlatformAccounts/card',
//             id_field: 'cont_id',
//             model: 'contactInfo',
//             column: 'info_type_name'
//         }
//     },
//
//     {
//         path: '/contractors/:id/bankAccounts',
//         component: List,
//         meta: {route: '/admin/contractor/bankAccounts/list', id_field: 'id',}
//     },
//     {
//         path: '/contractors/:id/bankAccounts/:cont_id',
//         component: Card,
//         meta: {
//             route: '/admin/contractor/bankAccounts/card',
//             id_field: 'cont_id',
//             model: 'contactInfo',
//             column: 'info_type_name'
//         }
//     },
//
//     {
//         path: '/contractors/:id/cryptoPlatformWallets',
//         component: List,
//         meta: {route: '/admin/contractor/cryptoPlatformWallets/list', id_field: 'id',}
//     },
//     {
//         path: '/contractors/:id/cryptoPlatformWallets/:cont_id',
//         component: Card,
//         meta: {
//             route: '/admin/contractor/cryptoPlatformWallets/card',
//             id_field: 'cont_id',
//             model: 'contactInfo',
//             column: 'info_type_name'
//         }
//     },
//
//     {
//         path: '/contractors/:id/cryptoExchangeWallets',
//         component: List,
//         meta: {route: '/admin/contractor/cryptoExchangeWallets/list', id_field: 'id',}
//     },
//     {
//         path: '/contractors/:id/cryptoExchangeWallets/:cont_id',
//         component: Card,
//         meta: {
//             route: '/admin/contractor/cryptoExchangeWallets/card',
//             id_field: 'cont_id',
//             model: 'contactInfo',
//             column: 'info_type_name'
//         }
//     },
//
//     //Companies
//     {path: '/companies', component: List, meta: {route: '/admin/company/list', id_field: 'id'}},
//     {
//         path: '/companies/:id',
//         component: Card,
//         meta: {route: '/admin/company/card', id_field: 'id', model: 'contractors', column: 'contractor_short_name'}
//     },
//
//     {
//         path: '/companies/:id/contactInfo',
//         component: List,
//         meta: {route: '/admin/company/ContactInfoList', id_field: 'id',}
//     },
//     {
//         path: '/companies/:id/contactInfo/:cont_id',
//         component: Card,
//         meta: {route: '/admin/company/card', id_field: 'cont_id', model: 'contactInfo', column: 'info_type_name'}
//     },
//
//     {
//         path: '/companies/:id/cryptoExchangeAccounts',
//         component: List,
//         meta: {route: '/admin/company/cryptoExchangeAccounts/list', id_field: 'id',}
//     },
//     {
//         path: '/companies/:id/cryptoExchangeAccounts/:cont_id',
//         component: Card,
//         meta: {
//             route: '/admin/company/cryptoExchangeAccounts/card',
//             id_field: 'cont_id',
//             model: 'contactInfo',
//             column: 'info_type_name'
//         }
//     },
//
//     {
//         path: '/companies/:id/cryptoPlatformAccounts',
//         component: List,
//         meta: {route: '/admin/company/cryptoPlatformAccounts/list', id_field: 'id',}
//     },
//     {
//         path: '/companies/:id/cryptoPlatformAccounts/:cont_id',
//         component: Card,
//         meta: {
//             route: '/admin/company/cryptoPlatformAccounts/card',
//             id_field: 'cont_id',
//             model: 'contactInfo',
//             column: 'info_type_name'
//         }
//     },
//
//     {
//         path: '/companies/:id/bankAccounts',
//         component: List,
//         meta: {route: '/admin/company/bankAccounts/list', id_field: 'id',}
//     },
//     {
//         path: '/companies/:id/bankAccounts/:cont_id',
//         component: Card,
//         meta: {
//             route: '/admin/company/bankAccounts/card',
//             id_field: 'cont_id',
//             model: 'contactInfo',
//             column: 'info_type_name'
//         }
//     },
//
//     {
//         path: '/companies/:id/cryptoPlatformWallets',
//         component: List,
//         meta: {route: '/admin/company/cryptoPlatformWallets/list', id_field: 'id',}
//     },
//     {
//         path: '/companies/:id/cryptoPlatformWallets/:cont_id',
//         component: Card,
//         meta: {
//             route: '/admin/company/cryptoPlatformWallets/card',
//             id_field: 'cont_id',
//             model: 'contactInfo',
//             column: 'info_type_name'
//         }
//     },
//
//     {
//         path: '/companies/:id/cryptoExchangeWallets',
//         component: List,
//         meta: {route: '/admin/company/cryptoExchangeWallets/list', id_field: 'id',}
//     },
//     {
//         path: '/companies/:id/cryptoExchangeWallets/:cont_id',
//         component: Card,
//         meta: {
//             route: '/admin/company/cryptoExchangeWallets/card',
//             id_field: 'cont_id',
//             model: 'contactInfo',
//             column: 'info_type_name'
//         }
//     },
//
//     //DbAreas
//     {path: '/dbAreas', component: List, meta: {route: '/admin/db/area/list', id_field: 'id'}},
//     {
//         path: '/dbAreas/:id',
//         component: Card,
//         meta: {route: '/admin/db/area/card', id_field: 'id', model: 'DbArea', column: 'db_area_code'}
//     },
//
//     //Countries
//     {path: '/countries', component: List, meta: {route: '/admin/country/list', id_field: 'id'}},
//     {
//         path: '/countries/:id',
//         component: Card,
//         meta: {route: '/admin/country/card', id_field: 'id', model: 'Country', column: 'country_name'}
//     },
//     {path: '/countries/:id/regions', component: List, meta: {route: '/admin/countries/regionsList', id_field: 'id',}},
//     {
//         path: '/countries/:id/regions/:cont_id',
//         component: Card,
//         meta: {route: '/admin/region/card', id_field: 'cont_id', model: 'Region', column: 'region_name'}
//     },
//
//     //ConsumerAccounts
//     {path: '/consumerAccounts', component: List, meta: {route: '/admin/consumer/accounts/list', id_field: 'id'}},
//     {
//         path: '/consumerAccounts/:id',
//         component: Card,
//         meta: {
//             route: '/admin/consumer/accounts/card',
//             id_field: 'id',
//             model: 'ConsumerAccount',
//             column: 'consumer_account_name'
//         }
//     },
//
//     //FileTypes
//     {path: '/fileTypes', component: List, meta: {route: '/admin/fileTypes/list', id_field: 'id'}},
//     {
//         path: '/fileTypes/:id',
//         component: Card,
//         meta: {route: '/admin/fileTypes/card', id_field: 'id', model: 'FileType', column: 'file_type_name'}
//     },
//
//     //AttachedKind
//     {path: '/attachedKind', component: List, meta: {route: '/admin/attachedKind/list', id_field: 'id'}},
//     {
//         path: '/attachedKind/:id',
//         component: Card,
//         meta: {route: '/admin/attachedKind/card', id_field: 'id', model: 'AttachedDocumentKind', column: 'att_doc_kind_name'}
//     },
//
//     //AttachedType
//     {path: '/attachedType', component: List, meta: {route: '/admin/attachedType/list', id_field: 'id'}},
//     {
//         path: '/attachedType/:id',
//         component: Card,
//         meta: {route: '/admin/attachedType/card', id_field: 'id', model: 'AttachedDocumentType', column: 'att_doc_type_name'}
//     },
//
//     //Languages
//     {path: '/languages', component: List, meta: {route: '/admin/languages/list', id_field: 'id'}},
//     {
//         path: '/languages/:id',
//         component: Card,
//         meta: {route: '/admin/language/card', id_field: 'id', model: 'Language', column: 'language_name'}
//     },
//
//     //ServersDb
//     {path: '/serversDb', component: List, meta: {route: '/admin/serverdbs/list', id_field: 'id'}},
//     {
//         path: '/serversDb/:id',
//         component: Card,
//         meta: {route: '/admin/serverdbs/card', id_field: 'id', model: 'ServerDb', column: 'server_name'}
//     },
//
//     //Banks
//     {path: '/banks', component: List, meta: {route: '/admin/banks/list', id_field: 'id'}},
//     {
//         path: '/banks/:id',
//         component: Card,
//         meta: {route: '/admin/banks/card', id_field: 'id', model: 'Bank', column: 'bank_name'}
//     },
//
//     //BankAccountTypes
//     {path: '/bankAccountTypes', component: List, meta: {route: '/admin/bankAccountTypes/list', id_field: 'id'}},
//     {
//         path: '/bankAccountTypes/:id',
//         component: Card,
//         meta: {
//             route: '/admin/bankAccountTypes/card',
//             id_field: 'id',
//             model: 'BankAccountType',
//             column: 'bank_account_type_name'
//         }
//     },
//
//     //CryptoTokens
//     {path: '/cryptoTokens', component: List, meta: {route: '/admin/cryptoTokens/list', id_field: 'id'}},
//     {
//         path: '/cryptoTokens/:id',
//         component: Card,
//         meta: {route: '/admin/cryptoTokens/card', id_field: 'id', model: 'CryptoToken', column: 'c_token_code'}
//     },
//
//     //Images
//     {path: '/images', component: List, meta: {route: '/admin/images/list', id_field: 'id'}},
//     {
//         path: '/images/:id',
//         component: Card,
//         meta: {route: '/admin/images/card', id_field: 'id', model: 'Image', column: 'image_name'}
//     },
//
//     //imageCategories
//     {path: '/imageCategories', component: List, meta: {route: '/admin/imageCategories/list', id_field: 'id'}},
//     {
//         path: '/imageCategories/:id',
//         component: Card,
//         meta: {
//             route: '/admin/imageCategories/card',
//             id_field: 'id',
//             model: 'ImageCategory',
//             column: 'image_category_name'
//         }
//     },
//
//     //Currencies
//     {path: '/currencies', component: List, meta: {route: '/admin/currencies/list', id_field: 'id'}},
//     {
//         path: '/currencies/:id',
//         component: Card,
//         meta: {route: '/admin/currencies/card', id_field: 'id', model: 'Currency', column: 'currency_name'}
//     },
//
//     //CryptoExchanges
//     {path: '/cryptoExchanges', component: List, meta: {route: '/admin/cryptoExchanges/list', id_field: 'id'}},
//     {
//         path: '/cryptoExchanges/:id',
//         component: Card,
//         meta: {
//             route: '/admin/cryptoExchanges/card',
//             id_field: 'id',
//             model: 'CryptoExchange',
//             column: 'c_exchange_name'
//         }
//     },
//
//     //CryptoPlatforms
//     {path: '/cryptoPlatforms', component: List, meta: {route: '/admin/cryptoPlatforms/list', id_field: 'id'}},
//     {
//         path: '/cryptoPlatforms/:id',
//         component: Card,
//         meta: {
//             route: '/admin/cryptoPlatforms/card',
//             id_field: 'id',
//             model: 'CryptoPlatform',
//             column: 'c_platform_name'
//         }
//     },
//
//     //Captions
//     {path: '/captions', component: List, meta: {route: '/admin/captions/list', id_field: 'id'}},
//     {
//         path: '/captions/:id',
//         component: Card,
//         meta: {route: '/admin/captions/card', id_field: 'id', model: 'Caption', column: 'caption_name'}
//     },
//
//     //TranslationCaptions
//     {path: '/translationCaptions', component: List, meta: {route: '/admin/translationCaptions/list', id_field: 'id'}},
//     {
//         path: '/translationCaptions/:id',
//         component: Card,
//         meta: {
//             route: '/admin/translationCaptions/card',
//             id_field: 'id',
//             model: 'TranslationCaption',
//             column: 'caption_translation'
//         }
//     },
//
//     //Dbs
//     {path: '/dbs', component: List, meta: {route: '/admin/db/list', id_field: 'id'}},
//     {
//         path: '/dbs/:id',
//         component: Card,
//         meta: {route: '/admin/db/card', id_field: 'id', model: 'DBase', column: 'db_name'}
//     },
//
//     //Dbs
//     {path: '/regions', component: List, meta: {route: '/admin/region/list', id_field: 'id'}},
//     {
//         path: '/regions/:id',
//         component: Card,
//         meta: {route: '/admin/region/card', id_field: 'id', model: 'Region', column: 'region_name'}
//     },
//
//     //AttachedFile
//     {path: '/attachedFile', component: List, meta: {route: '/admin/attachedFile', id_field: 'id'}},
//
//     //DbTypes
//     {path: '/dbTypes', component: List, meta: {route: '/admin/dbtypes/list', id_field: 'id'}},
//     {
//         path: '/dbTypes/:id',
//         component: Card,
//         meta: {route: '/admin/dbtypes/card', id_field: 'id', model: 'DbType', column: 'db_type_name'}
//     },
//
//     //Pages
//     {path: '/pages',component: List,meta: {route:'/admin/dbtypes/list',id_field:'id'}},
//     {path: '/pages/:id', component: Card,meta: {route:'/admin/dbtypes/card',id_field:'id',model: 'contractors',column: 'contractor_short_name'}},
//
// ];
