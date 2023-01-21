import CoursesList from './components/courseCards';
import CtypesAccordion from './components/ctypesAccordion';
import CampusesAccordion from './components/campusesAccordion';

const App = () => {
  return (
    <>
      <div class="herosec overflow-hidden">
        <div class="container">
          <div class="row">
            <div
              class="col-lg-6 col-md-12 d-flex justify-content-center flex-column ht700 zi2 pdr70 bgreen pdt25 pdb25">
              <h1>Land a career that you love</h1>
              <p class="ft27 excerpt">I have had an amazing time studying at the College, made lots of new friends and
                cannot wait to progress to Level 2, so that I can pursue my dream of working with animals.</p>
              <span class="ft16">Amy studied Introduction to Animal Care (Level 1)</span>
            </div>
            <div className="col-lg-6 col-md-12 ht700">
              <img src={ "/wp-content/uploads/2023/01/Enfield.png" } alt=""/>
            </div>
          </div>
        </div>
      </div>
      <div class="content">
        <div className="container">
          <div class="row">
            <div className="col-lg-3 col-md-12 pdr20">
              <CampusesAccordion/>
              <CtypesAccordion/>
            </div>
            <div className="col-lg-9 col-md-12">
              <div class="row">
                <CoursesList/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

ReactDOM.render(
  <App/>,
  document.getElementById('react-app')
);
