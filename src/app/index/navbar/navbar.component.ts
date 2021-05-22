import { Component, OnInit } from '@angular/core';
import { OrderComponent } from '../order/order.component';
import {MatDialog} from '@angular/material/dialog';

//table's data
export interface PeriodicElement {
  name: string;
  position: number;
  weight: number;
  symbol: string;
}
//table's data
const ELEMENT_DATA: PeriodicElement[] = [
  {position: 1, name: 'Hydrogen', weight: 1.0079, symbol: 'H'},
  {position: 2, name: 'Helium', weight: 4.0026, symbol: 'He'},
  {position: 3, name: 'Lithium', weight: 6.941, symbol: 'Li'},
  {position: 4, name: 'Beryllium', weight: 9.0122, symbol: 'Be'},
  {position: 5, name: 'Boron', weight: 10.811, symbol: 'B'},
  {position: 6, name: 'Carbon', weight: 12.0107, symbol: 'C'},
  {position: 7, name: 'Nitrogen', weight: 14.0067, symbol: 'N'},
  {position: 8, name: 'Oxygen', weight: 15.9994, symbol: 'O'},
  {position: 9, name: 'Fluorine', weight: 18.9984, symbol: 'F'},
  {position: 10, name: 'Neon', weight: 20.1797, symbol: 'Ne'},
];

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css']
})
export class NavbarComponent implements OnInit {

//table's data
  displayedColumns: string[] = ['position', 'name', 'weight', 'symbol'];
  dataSource = ELEMENT_DATA;
//Single Page Routing
  Order:boolean = false;
  Invoice:boolean = false;

  showFiller = false;

  constructor(public dialog: MatDialog) { }

  openOrder(){
    this.Order= true;
    this.Invoice = false;
  }
  openInvoice(){
    this.Invoice = true;
    this.Order = false;
  }
  openDialog() {
    this.dialog.open(OrderComponent);
  }

  ngOnInit(): void {
  }


}
