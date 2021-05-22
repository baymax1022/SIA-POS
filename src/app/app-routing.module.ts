import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { DashboardComponent } from './index/dashboard/dashboard.component';
import { IndexComponent } from './index/index.component';

const routes: Routes = [
  { path: '', component: IndexComponent },
  { path: 'dash', component: DashboardComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
