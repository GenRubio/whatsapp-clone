const Utils = require("../objects/Utils");

const UserSettingsController = {
    pageEl: {
        selector: "#chat-page",
    },
    logOutButtonEl: {
        selector: ".user-settings-out-js",
    },
    userProfileEl: {
        selector: ".user-settings-image-js",
        container: ".user-profile-container-js",
        backButton: ".profile-back-button-js"
    },
    userNotificationsEl:{
        selector: ".user-settings-bell-js",
        container: ".user-notifications-container-js",
        backButton: ".notifications-back-button-js"
    },
    userAddFriendEl:{
        selector: ".user-settings-add-user-js",
        container: ".user-add-friend-container-js",
        backButton: ".add-friend-back-button-js",
        searchInput: "#searchFriendInput",
        resultContainer: ".user-add-search-result-container"
    },
    init() {
        this.setListeners();
    },
    setListeners() {
        $(document).on("click", this.logOutButtonEl.selector, () => {
            this.logOutHandler();
        });

        $(document).on("click", this.userAddFriendEl.selector, () => {
            this.showUserAddFriendHandler();
        });

        $(document).on("click", this.userAddFriendEl.backButton, () => {
            this.closeUserAddFriendHandler();
        });

        $(document).on("click", this.userProfileEl.selector, () => {
            this.showUserProfileHandler();
        });

        $(document).on("click", this.userProfileEl.backButton, () => {
            this.closeUserProfileHandler();
        });

        $(document).on("click", this.userNotificationsEl.selector, () => {
            this.showUserNotificationsHandler();
        });

        $(document).on("click", this.userNotificationsEl.backButton, () => {
            this.closeUserNotificationsHandler();
        });
    },
    closeUserAddFriendHandler(){
        const container = $(this.userAddFriendEl.container);
        container.removeClass('move-container');
    },
    showUserAddFriendHandler(){
        const container = $(this.userAddFriendEl.container);
        container.addClass('move-container');

        $(this.userAddFriendEl.searchInput).val("");
        $(this.userAddFriendEl.resultContainer).empty();
    },
    closeUserNotificationsHandler(){
        const container = $(this.userNotificationsEl.container);
        container.removeClass('move-container');
    },
    showUserNotificationsHandler(){
        const container = $(this.userNotificationsEl.container);
        container.addClass('move-container');
    },
    closeUserProfileHandler(){
        const container = $(this.userProfileEl.container);
        container.removeClass('move-container');
    },
    showUserProfileHandler() {
        const container = $(this.userProfileEl.container);
        container.addClass('move-container');
    },
    logOutHandler() {
        $.ajax({
            url: Utils.getUrl("logOut"),
            method: "GET",
            success: function () {
                location.href = Utils.getUrl("home");
            },
        });
    },
};

module.exports = UserSettingsController;
