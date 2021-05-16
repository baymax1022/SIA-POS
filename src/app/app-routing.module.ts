import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { DashboardComponent} from './dashboard/dashboard.component';
import { SidenavComponent} from './sidenav/sidenav.component';
import { SampletabComponent} from './sampletab/sampletab.component';


const routes: Routes = [
  
  {path:'', component:DashboardComponent},
  {path:'nav',component:SidenavComponent},
  {path:'Sample', component:SampletabComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
