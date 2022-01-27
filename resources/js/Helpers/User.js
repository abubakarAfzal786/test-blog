import Storage from "./Storage";
import Token from "./Token";
class User {
    responseAfterLogin(data) {
        const access_token = data.access_token;
        const username = data.user;
        if (Token.isVaild(access_token)) {
            Storage.store(username, access_token);
            window.location = "/";
        }
    }
    hasToken() {
        const StoreToken = Storage.getToken();
        if (StoreToken) {
            return Token.isVaild(StoreToken) ? true : false;
        }
        return false;
    }
    loggedin() {
        return this.hasToken();
    }
    logout() {
        Storage.clearitems();
        window.location = "/";
    }
    name() {
        return Storage.getUser();
    }
    id() {
        if (this.loggedin()) {
            const payload = Token.payload(Storage.getToken());
            return payload.sub;
        }
    }
}
export default (User = new User());
