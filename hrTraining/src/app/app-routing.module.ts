import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { UserDetailComponent } from './pages/user-detail/user-detail.component';
import { EvaluationsComponent } from './pages/evaluations/evaluations.component';
import { RegisterComponent } from './pages/register/register.component';
import { UsersPaginateComponent } from './pages/users-paginate/users-paginate.component';
import { EvaluationListComponent } from './pages/evaluation-list/evaluation-list.component';

const routes: Routes = [
  { path: '', redirectTo: 'users-paginate', pathMatch: 'full' },
  { path: 'users-paginate', component: UsersPaginateComponent },
  { path: 'add', component: RegisterComponent },
  { path: 'evaluate', component: EvaluationsComponent },
  { path: 'details/:id', component: UserDetailComponent },
  { path: 'evaluate-paginate', component: EvaluationListComponent },
];


@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
