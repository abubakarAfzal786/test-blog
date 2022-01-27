class Storage {
    storetoken(token) {
        localStorage.setItem("token", token);
    }
    storeUser(user) {
        localStorage.setItem("user", user);
    }
    clearitems() {
        localStorage.removeItem("token");
        localStorage.removeItem("user");
    }
    store(user, token) {
        this.storeUser(user);
        this.storetoken(token);
    }
    getToken() {
        return localStorage.getItem("token");
    }
    getUser() {
        return localStorage.getItem("user");
    }
}
export default (Storage = new Storage());
