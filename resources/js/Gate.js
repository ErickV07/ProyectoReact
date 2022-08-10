export default class Gate{

    constructor(user){
        this.user = user;
    }
    nameUser(){
        return this.user.name;
    }
    getEmailUser(){
        return this.user.email;
    }
    
    getIdUser(){
        return this.user.id;
    }

    getImageUser(){
        return this.user.image;
    }
    //roles
    isSuperAdmin(){
        return this.user.tipo_usuario === 'SuperAdmin';
    }
    isAdmin(){
        return this.user.tipo_usuario === 'admin';
    }
    //roles
    isUser(){
        return this.user.tipo_usuario === 'user';
    }
    isEmprendedor(){
        return this.user.tipo_usuario === 'Emprendedor';
    }    
    isAdminOrUser(){
        if(this.user.tipo_usuario === 'user' || this.user.tipo_usuario === 'admin'){
            return true;
        }
    }
}

