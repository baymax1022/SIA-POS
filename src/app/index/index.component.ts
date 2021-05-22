import { Component, OnInit } from '@angular/core';
import { DataService } from '../services/data.service'; // Service

@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.css']
})
export class IndexComponent implements OnInit {
  // Variables ----------------

  ing: any; // ----- this is the result ----------
  ings: any; // ------ this will be the payload from the result ---------

  constructor(private data: DataService) {}

  ngOnInit(): void {
    this.getIngredients(); // ----- RUNS FUNCTIONS --------
  }
  
  // GET ----------------

  // GET INGREDIENTS --------------
  getIngredients(): void{
    this.data.getData('ingredients').subscribe((res)=>{
      this.ings = res;
      this.ing = this.ings.payload;
      console.log(this.ing);
    });
  }
}
