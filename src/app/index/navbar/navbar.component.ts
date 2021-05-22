import { Component, OnInit } from '@angular/core';
import { ModalComponent } from '../modal/modal.component';
import {MatDialog} from '@angular/material/dialog';

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css']
})
export class NavbarComponent implements OnInit {

 
  showFiller = false;

  constructor(public dialog: MatDialog) { }
  openDialog() {
    this.dialog.open(ModalComponent);
  }

  ngOnInit(): void {
  }


}
