import { useCourses } from "../api/courses";
import $ from 'jquery';

function CoursesList() {

  //** Bootstrap/jquery tooltip

  $(function() {
    $('[data-toggle="tooltip"]').tooltip()
  })

  const { courses } = useCourses();

  return (courses.map((courses) => {
      return <div className="col-lg-4 col-md-6">
        <div class="courseCard">
          <img src={ courses.img } alt=""/>
          <div className="infoCourse">
            <h3>{ courses.title }</h3>
            <div><span>{ courses.duration }</span></div>
          </div>
          <div className="courseCampuses">
            { courses.campuses.map((campus) => {
              return <div class="circleCampus" data-toggle="tooltip" data-placement="top" title={ campus.name }>
                { campus.name.match(/\b\w/g).join('').length > 2 ? campus.name.match(/\b\w/g).join('').slice(0, -1) : campus.name.match(/\b\w/g).join('') }
              </div>
            }) }
          </div>
        </div>

      </div>
    })
  )
}

export default CoursesList