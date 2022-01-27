export default  {
    API: "http://localhost:8000",
    Login: "/api/login",
    Register: "/api/register",
    ApiStats: "/api/stats",
    SentEmailResetPasswordLink: "/api/password/email",
    ResetPassword: "/api/password/reset",

    // STORAGE
    StorageUrl: "http://localhost:8000/storage/uploads",
    StoragePathUrl: "/storage/uploads",

    // COMPANY
    ListCompany: "/api/company/list",
    CreateCompany: "/api/company/create",
    DetailCompany: "/api/company/getData",
    UpdateCompany: "/api/company/update",
    UpdateImageCompany: "/api/company/update-image",
    DeleteCompany: "/api/company/delete",

    //COMPANY TYPE
    ListCompanyType: "/api/company-type/list",
    CreateCompanyType: "/api/company-type/create",
    DetailCompanyType: "/api/company-type/getData",
    UpdateCompanyType: "/api/company-type/update",
    DeleteCompanyType: "/api/company-type/delete",

    // VACANCY
    ListVacancy: "/api/vacancy/list",
    CreateVacancy: "/api/vacancy/create",
    DetailVacancy: "/api/vacancy/getData",
    DetailJoinedVacancy: "/api/vacancy/getDataJoined",
    UpdateVacancy: "/api/vacancy/update",
    UpdateStatusVacancy: "/api/vacancy/update-status",
    DeleteVacancy: "/api/vacancy/delete",
    DeleteJoinedCompaniesVacancy: "/api/vacancy/reject-joined-company",

    // TRANSACTION
    ListTransaction: "/api/transaction/list",
    CreateTransaction: "/api/transaction/create",
    DetailTransaction: "/api/transaction/getData",
    UpdateTransaction: "/api/transaction/update",
    DeleteTransaction: "/api/transaction/delete",

    // ROLE
    ListRole: "/api/role/list",
    CreateRole: "/api/role/create",
    DetailRole: "/api/role/getData",
    UpdateRole: "/api/role/update",
    DeleteRole: "/api/role/delete",

    // CONTRACT
    ListContract: "/api/contract/index",
    CreateContract: "/api/contract/create",
    DetailContract: "/api/contract/detail",
    UpdateDocumentContract: "/api/contract/update-document",
    UpdateContract: "/api/contract/update",
    UpdateStatusContract: "/api/contract/update-status",
    DeleteContract: "/api/contract/delete",

    // WORK HISTORY
    ListWorkHistory: "/api/work-history/list",
    CreateWorkHistory: "/api/work-history/create",
    DetailWorkHistory: "/api/work-history/getData",
    UpdateWorkHistory: "/api/work-history/update",
    DeleteWorkHistory: "/api/work-history/delete",

    // NOTIFICATION
    ListNotification: "/api/notification/list",
    ListAllNotification: "/api/notification/list/all",
    UpdateNotification: "/api/notification/update",

    // UPLOAD FILE
    UploadFile: "/api/upload/company-interest/file",

    // JOIN VACANCY
    JoinVacancy: "/api/join/vacancy"
}