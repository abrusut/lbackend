import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { AppRoutingModule } from './app-routing.module';
import { HttpClientModule } from '@angular/common/http';
import { AppComponent } from './app.component';
import { RegisterComponent } from './pages/register/register.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

import { UserDetailComponent } from './pages/user-detail/user-detail.component';
import { EvaluationsComponent } from './pages/evaluations/evaluations.component';
import { UsersPaginateComponent } from './pages/users-paginate/users-paginate.component';
import { EvaluationListComponent } from './pages/evaluation-list/evaluation-list.component';

import { TableModule } from 'primeng/table';
import { PaginatorModule } from 'primeng/paginator';
import { DropdownModule } from 'primeng/dropdown';
import { MessagesModule } from 'primeng/messages';
import { AutoCompleteModule } from 'primeng/autocomplete';
import { ToastModule } from 'primeng/toast';

import { MessageService } from 'primeng/api';

@NgModule({
  declarations: [
    AppComponent,
    RegisterComponent,
    RegisterComponent,
    UserDetailComponent,
    EvaluationsComponent,
    UsersPaginateComponent,
    EvaluationListComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule,
    ReactiveFormsModule,
    HttpClientModule,
    BrowserAnimationsModule,
    TableModule,
    PaginatorModule,
    DropdownModule,
    MessagesModule,
    AutoCompleteModule,
    ToastModule
  ],
  providers: [MessageService],
  bootstrap: [AppComponent]
})
export class AppModule { }
