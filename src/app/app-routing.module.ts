import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { IndexComponent } from './index/index.component';
import { POSComponent } from './pos/pos.component';
import { LoginComponent } from './login/login.component';
import { PaymentComponent } from './payment/payment.component';
import { OrderComponent } from './index/order/order.component';
const routes: Routes = [
  { path: '', component: IndexComponent },
  {
    path: 'pos', 
    component: POSComponent
  },
  {
    path: 'login', 
    component: LoginComponent
  },
  {
    path: 'payment', 
    component: PaymentComponent
  },
  {
    path: 'order', 
    component: OrderComponent
  }
  
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
