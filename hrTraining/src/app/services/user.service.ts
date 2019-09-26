import { Injectable } from '@angular/core';
import { User } from '../domain/user.domain';
import { HttpClient } from '@angular/common/http';
import { URL_SERVICIOS } from '../config/config';

import { Router } from '@angular/router';
import { Observable } from 'rxjs';


@Injectable({
  providedIn: 'root'
})
export class UserService {

  usuario: User;
  token: string;

  constructor(public http: HttpClient, public router: Router) {
    console.log('Servicio de usuarios');
  }

  registrarUser(user: User): Observable<any> {
    const url: string = URL_SERVICIOS + '/users';

    return this.http.post(url, user);
  }

  actualizarUsuario(user: User): Observable<any> {
    const url: string = URL_SERVICIOS + '/usuario/' + user.id;
    return this.http.put(url, user);
  }

  findAllUsers(page: number= 0, itemsPerPage: number= 10): Observable<any> {
    const url = URL_SERVICIOS + '/users?page=' + page + '&itemsPerPage=' + itemsPerPage ;
    return this.http.get(url);
  }

  findUserById(id): Observable<any> {
    const url = URL_SERVICIOS + '/users/' + id;
    return this.http.get(url);
  }

}
