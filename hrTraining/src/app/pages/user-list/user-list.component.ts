import { Component, OnInit } from '@angular/core';
import { Observable } from "rxjs";
import { User } from '../../domain/user.domain';
import { UserService } from '../../services/user.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-user-list',
  templateUrl: './user-list.component.html',
  styleUrls: ['./user-list.component.css']
})
export class UserListComponent implements OnInit {

  users: Observable<User[]>;

  constructor(private userService: UserService, private router: Router) { }

  ngOnInit() {
    this.loadUsers();
  }

  loadUsers() {
    this.users = this.userService.findAllUsers();
  }

  userDetails(id: number){
    this.router.navigate(['details', id]);
  }
}
